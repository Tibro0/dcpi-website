<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerFeatureController;
use App\Http\Controllers\Admin\DiplomaEngineeringCourseController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FrontPageAboutUsSectionController;
use App\Http\Controllers\Admin\FrontPageCtaSectionController;
use App\Http\Controllers\Admin\FrontPageSuccessStorySectionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');


/** Slider Routes */
Route::resource('slider', SliderController::class);

/** Slider Routes */
Route::resource('banner-feature', BannerFeatureController::class);

/** Front Page About Us Section Routes */
Route::get('front-page-about-us-section/index', [FrontPageAboutUsSectionController::class, 'index'])->name('front-page-about-us-section.index');
Route::put('front-page-about-us-section/update', [FrontPageAboutUsSectionController::class, 'update'])->name('front-page-about-us-section.update');

/** Diploma Engineering Course Routes */
Route::resource('diploma-engineering-course', DiplomaEngineeringCourseController::class);


/** Front Page Cta Section Routes */
Route::get('front-page-cta-section/index', [FrontPageCtaSectionController::class, 'index'])->name('front-page-cta-section.index');
Route::put('front-page-cta-section/update', [FrontPageCtaSectionController::class, 'update'])->name('front-page-cta-section.update');

/** Front Page Success Story Section Routes */
Route::get('front-page-success-story-section/index', [FrontPageSuccessStorySectionController::class, 'index'])->name('front-page-success-story-section.index');
Route::put('front-page-success-story-section/update', [FrontPageSuccessStorySectionController::class, 'update'])->name('front-page-success-story-section.update');

/** Events Routes */
Route::resource('event', EventController::class);

/** Teacher Routes */
Route::resource('teacher', TeacherController::class);
