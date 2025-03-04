<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TeacherDataTable;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeacherDataTable $dataTable)
    {
        return $dataTable->render('admin.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:teachers,name'],
            'designation' => ['required', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'max:255'],
            'facebook_id_name' => ['nullable', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'linkedin_id_name' => ['nullable', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_id_name' => ['nullable', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'address' => ['nullable', 'max:255'],
            'address_url' => ['nullable', 'max:255'],
            'short_description' => ['required', 'max:255'],
            'long_description' => ['required'],
            'priority_number' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(445,501);
            $img->toPng()->save(base_path('public/uploads/teacher_image/'.$name_gen));
            $save_url = 'uploads/teacher_image/'.$name_gen;

            $teacher = new Teacher();
            $teacher->image = $save_url;
            $teacher->name = $request->name;
            $teacher->slug = Str::slug($request->name);
            $teacher->designation = $request->designation;
            $teacher->email = $request->email;
            $teacher->whatsapp = $request->whatsapp;
            $teacher->facebook_id_name = $request->facebook_id_name;
            $teacher->facebook_url = $request->facebook_url;
            $teacher->linkedin_id_name = $request->linkedin_id_name;
            $teacher->linkedin_url = $request->linkedin_url;
            $teacher->twitter_id_name = $request->twitter_id_name;
            $teacher->twitter_url = $request->twitter_url;
            $teacher->website_url = $request->website_url;
            $teacher->address = $request->address;
            $teacher->address_url = $request->address_url;
            $teacher->short_description = $request->short_description;
            $teacher->long_description = $request->long_description;
            $teacher->priority_number = $request->priority_number;
            $teacher->status = $request->status;
            $teacher->save();

            toastr()->success('Created Successfully');
            return redirect()->route('admin.teacher.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:teachers,name,'.$id],
            'designation' => ['required', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'max:255'],
            'facebook_id_name' => ['nullable', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'linkedin_id_name' => ['nullable', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_id_name' => ['nullable', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'address' => ['nullable', 'max:255'],
            'address_url' => ['nullable', 'max:255'],
            'short_description' => ['required', 'max:255'],
            'long_description' => ['required'],
            'priority_number' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(445,501);
            $img->toPng()->save(base_path('public/uploads/teacher_image/'.$name_gen));
            $save_url = 'uploads/teacher_image/'.$name_gen;

            $teacher = Teacher::findOrFail($id);
            $teacher->image = $save_url;
            $teacher->name = $request->name;
            $teacher->slug = Str::slug($request->name);
            $teacher->designation = $request->designation;
            $teacher->email = $request->email;
            $teacher->whatsapp = $request->whatsapp;
            $teacher->facebook_id_name = $request->facebook_id_name;
            $teacher->facebook_url = $request->facebook_url;
            $teacher->linkedin_id_name = $request->linkedin_id_name;
            $teacher->linkedin_url = $request->linkedin_url;
            $teacher->twitter_id_name = $request->twitter_id_name;
            $teacher->twitter_url = $request->twitter_url;
            $teacher->website_url = $request->website_url;
            $teacher->address = $request->address;
            $teacher->address_url = $request->address_url;
            $teacher->short_description = $request->short_description;
            $teacher->long_description = $request->long_description;
            $teacher->priority_number = $request->priority_number;
            $teacher->status = $request->status;
            $teacher->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Created Successfully');
            return redirect()->route('admin.teacher.index');
        }else{
            $teacher = Teacher::findOrFail($id);
            $teacher->name = $request->name;
            $teacher->slug = Str::slug($request->name);
            $teacher->designation = $request->designation;
            $teacher->email = $request->email;
            $teacher->whatsapp = $request->whatsapp;
            $teacher->facebook_id_name = $request->facebook_id_name;
            $teacher->facebook_url = $request->facebook_url;
            $teacher->linkedin_id_name = $request->linkedin_id_name;
            $teacher->linkedin_url = $request->linkedin_url;
            $teacher->twitter_id_name = $request->twitter_id_name;
            $teacher->twitter_url = $request->twitter_url;
            $teacher->website_url = $request->website_url;
            $teacher->address = $request->address;
            $teacher->address_url = $request->address_url;
            $teacher->short_description = $request->short_description;
            $teacher->long_description = $request->long_description;
            $teacher->priority_number = $request->priority_number;
            $teacher->status = $request->status;
            $teacher->save();

            toastr()->success('Created Successfully');
            return redirect()->route('admin.teacher.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        unlink($teacher->image);
        $teacher->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
