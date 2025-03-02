<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerFeature;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $bannerFeatures = BannerFeature::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('frontend.home.index', compact('sliders', 'bannerFeatures'));
    }
}
