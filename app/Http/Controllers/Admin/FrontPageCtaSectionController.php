<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontPageCtaSection;
use Illuminate\Http\Request;

class FrontPageCtaSectionController extends Controller
{
    public function index(){
        $frontPageCtaSection = FrontPageCtaSection::first();
        return view('admin.front-page-cta-section.index', compact('frontPageCtaSection'));
    }

    public function update(Request $request){
        $request->validate([
            'top_title' => ['required', 'max:255'],
            'main_title' => ['required', 'max:255'],
            'button_name' => ['nullable', 'max:255'],
            'button_url' => ['nullable', 'max:255'],
        ]);

        FrontPageCtaSection::UpdateOrCreate(
            ['id' => 1],
            [
                'top_title' => $request->top_title,
                'main_title' => $request->main_title,
                'button_name' => $request->button_name,
                'button_url' => $request->button_url,
            ]
        );

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
}
