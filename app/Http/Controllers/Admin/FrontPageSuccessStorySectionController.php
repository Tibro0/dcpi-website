<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontPageSuccessStorySection;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FrontPageSuccessStorySectionController extends Controller
{
    public function index(){
        $frontPageSuccessStorySection = FrontPageSuccessStorySection::first();
        return view('admin.front-page-success-story-section.index', compact('frontPageSuccessStorySection'));
    }

    public function update(Request $request){
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'video_link' => ['nullable', 'url', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:600'],
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(1280,1183);
            $img->toPng()->save(base_path('public/uploads/front_page_success_story_section_image/'.$name_gen));
            $save_url = 'uploads/front_page_success_story_section_image/'.$name_gen;

            FrontPageSuccessStorySection::UpdateOrCreate(
                ['id' => 1],
                [
                    'image' => $save_url,
                    'video_link' => $request->video_link,
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }else{
            FrontPageSuccessStorySection::UpdateOrCreate(
                ['id' => 1],
                [
                    'video_link' => $request->video_link,
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            );

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }
    }
}
