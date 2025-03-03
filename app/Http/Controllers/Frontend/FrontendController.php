<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerFeature;
use App\Models\DiplomaEngineeringCourse;
use App\Models\FrontPageAboutUsSection;
use App\Models\FrontPageCtaSection;
use App\Models\FrontPageSuccessStorySection;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $bannerFeatures = BannerFeature::orderBy('id', 'DESC')->where('status', 1)->get();
        $frontPageAboutUsSection = FrontPageAboutUsSection::first();
        $diplomaEngineeringCourses = DiplomaEngineeringCourse::orderBy('priority_number', 'asc')->where('status', 1)->get();
        $frontPageCtaSection = FrontPageCtaSection::first();
        $frontPageSuccessStorySection = FrontPageSuccessStorySection::first();
        return view('frontend.home.index', compact('sliders', 'bannerFeatures', 'frontPageAboutUsSection', 'diplomaEngineeringCourses', 'frontPageCtaSection', 'frontPageSuccessStorySection'));
    }
}
