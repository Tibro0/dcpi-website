<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerFeatureController;
use App\Http\Controllers\Admin\FrontPageAboutUsSectionController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');


/** Slider Routes */
Route::resource('slider', SliderController::class);

/** Slider Routes */
Route::resource('banner-feature', BannerFeatureController::class);

/** Front Page About Us Section Routes */
Route::get('front-page-about-us-section/index', [FrontPageAboutUsSectionController::class, 'index'])->name('front-page-about-us-section.index');
Route::put('front-page-about-us-section/update', [FrontPageAboutUsSectionController::class, 'update'])->name('front-page-about-us-section.update');
