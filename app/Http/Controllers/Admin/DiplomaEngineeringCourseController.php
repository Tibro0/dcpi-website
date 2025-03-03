<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DiplomaEngineeringCourseDataTable;
use App\Http\Controllers\Controller;
use App\Models\DiplomaEngineeringCourse;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class DiplomaEngineeringCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DiplomaEngineeringCourseDataTable $dataTable)
    {
        return $dataTable->render('admin.diploma-engineering-course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.diploma-engineering-course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' =>['required', 'image', 'max:2000'],
            'name' => ['required', 'max:255', 'unique:diploma_engineering_courses,name'],
            'month' => ['required', 'max:255'],
            'duration' => ['required', 'max:255'],
            'course_fee' => ['required', 'max:255'],
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
            $img = $img->resize(1110,555);
            $img->toPng()->save(base_path('public/uploads/diploma_engineering_course_image/'.$name_gen));
            $save_url = 'uploads/diploma_engineering_course_image/'.$name_gen;

            $diplomaEngineeringCourse = new DiplomaEngineeringCourse();
            $diplomaEngineeringCourse->image = $save_url;
            $diplomaEngineeringCourse->name = $request->name;
            $diplomaEngineeringCourse->slug = Str::slug($request->name);
            $diplomaEngineeringCourse->month = $request->month;
            $diplomaEngineeringCourse->duration = $request->duration;
            $diplomaEngineeringCourse->course_fee = $request->course_fee;
            $diplomaEngineeringCourse->short_description = $request->short_description;
            $diplomaEngineeringCourse->long_description = $request->long_description;
            $diplomaEngineeringCourse->priority_number = $request->priority_number;
            $diplomaEngineeringCourse->status = $request->status;
            $diplomaEngineeringCourse->save();

            toastr()->success('Created Successfully');
            return redirect()->route('admin.diploma-engineering-course.index');
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
        $diplomaEngineeringCourse = DiplomaEngineeringCourse::findOrFail($id);
        return view('admin.diploma-engineering-course.edit', compact('diplomaEngineeringCourse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' =>['nullable', 'image', 'max:2000'],
            'name' => ['required', 'max:255', 'unique:diploma_engineering_courses,name,'.$id],
            'month' => ['required', 'max:255'],
            'duration' => ['required', 'max:255'],
            'course_fee' => ['required', 'max:255'],
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
            $img = $img->resize(1110,555);
            $img->toPng()->save(base_path('public/uploads/diploma_engineering_course_image/'.$name_gen));
            $save_url = 'uploads/diploma_engineering_course_image/'.$name_gen;

            $diplomaEngineeringCourse = DiplomaEngineeringCourse::findOrFail($id);
            $diplomaEngineeringCourse->image = $save_url;
            $diplomaEngineeringCourse->name = $request->name;
            $diplomaEngineeringCourse->slug = Str::slug($request->name);
            $diplomaEngineeringCourse->month = $request->month;
            $diplomaEngineeringCourse->duration = $request->duration;
            $diplomaEngineeringCourse->course_fee = $request->course_fee;
            $diplomaEngineeringCourse->short_description = $request->short_description;
            $diplomaEngineeringCourse->long_description = $request->long_description;
            $diplomaEngineeringCourse->priority_number = $request->priority_number;
            $diplomaEngineeringCourse->status = $request->status;
            $diplomaEngineeringCourse->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.diploma-engineering-course.index');
        }else{
            $diplomaEngineeringCourse = DiplomaEngineeringCourse::findOrFail($id);
            $diplomaEngineeringCourse->name = $request->name;
            $diplomaEngineeringCourse->slug = Str::slug($request->name);
            $diplomaEngineeringCourse->month = $request->month;
            $diplomaEngineeringCourse->duration = $request->duration;
            $diplomaEngineeringCourse->course_fee = $request->course_fee;
            $diplomaEngineeringCourse->short_description = $request->short_description;
            $diplomaEngineeringCourse->long_description = $request->long_description;
            $diplomaEngineeringCourse->priority_number = $request->priority_number;
            $diplomaEngineeringCourse->status = $request->status;
            $diplomaEngineeringCourse->save();

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.diploma-engineering-course.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diplomaEngineeringCourse = DiplomaEngineeringCourse::findOrFail($id);
        unlink($diplomaEngineeringCourse->image);
        $diplomaEngineeringCourse->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
