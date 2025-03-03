<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EventDataTable;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventDataTable $dataTable)
    {
        return $dataTable->render('admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:events,name'],
            'location' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'time' => ['required', 'max:255'],
            'fee' => ['required', 'max:255'],
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
            $img->toPng()->save(base_path('public/uploads/event_image/'.$name_gen));
            $save_url = 'uploads/event_image/'.$name_gen;

            $event = new Event();
            $event->image = $save_url;
            $event->name = $request->name;
            $event->slug = Str::slug($request->name);
            $event->location = $request->location;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->fee = $request->fee;
            $event->short_description = $request->short_description;
            $event->long_description = $request->long_description;
            $event->priority_number = $request->priority_number;
            $event->status = $request->status;
            $event->save();

            toastr()->success('Created Successfully!');
            return redirect()->route('admin.event.index');
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
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:events,name,'.$id],
            'location' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'time' => ['required', 'max:255'],
            'fee' => ['required', 'max:255'],
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
            $img->toPng()->save(base_path('public/uploads/event_image/'.$name_gen));
            $save_url = 'uploads/event_image/'.$name_gen;

            $event = Event::findOrFail($id);
            $event->image = $save_url;
            $event->name = $request->name;
            $event->slug = Str::slug($request->name);
            $event->location = $request->location;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->fee = $request->fee;
            $event->short_description = $request->short_description;
            $event->long_description = $request->long_description;
            $event->priority_number = $request->priority_number;
            $event->status = $request->status;
            $event->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Created Successfully!');
            return redirect()->route('admin.event.index');
        }else{
            $event = Event::findOrFail($id);
            $event->name = $request->name;
            $event->slug = Str::slug($request->name);
            $event->location = $request->location;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->fee = $request->fee;
            $event->short_description = $request->short_description;
            $event->long_description = $request->long_description;
            $event->priority_number = $request->priority_number;
            $event->status = $request->status;
            $event->save();

            toastr()->success('Created Successfully!');
            return redirect()->route('admin.event.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        unlink($event->image);
        $event->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
