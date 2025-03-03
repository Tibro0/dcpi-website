<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontPageAboutUsSection;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FrontPageAboutUsSectionController extends Controller
{
    public function index(){
        $frontPageAboutUsSection = FrontPageAboutUsSection::first();
        return view('admin.front-page-about-us-section.index', compact('frontPageAboutUsSection'));
    }

    public function update(Request $request){
        $request->validate([
            'image' => ['nullable', 'image', 'max:2000'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'button_name' => ['nullable', 'max:255'],
            'button_url' => ['nullable', 'url', 'max:255'],
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(816,504);
            $img->toPng()->save(base_path('public/uploads/front_page_about_us_section_image/'.$name_gen));
            $save_url = 'uploads/front_page_about_us_section_image/'.$name_gen;

            FrontPageAboutUsSection::UpdateOrCreate(
                ['id' => 1],
                [
                    'image' => $save_url,
                    'title' => $request->title,
                    'description' => $request->description,
                    'button_name' => $request->button_name,
                    'button_url' => $request->button_url,
                ]
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }else{
            FrontPageAboutUsSection::UpdateOrCreate(
                ['id' => 1],
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'button_name' => $request->button_name,
                    'button_url' => $request->button_url,
                ]
            );

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }
    }
}
