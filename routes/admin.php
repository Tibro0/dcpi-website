<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerFeatureController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');


/** Slider Routes */
Route::resource('slider', SliderController::class);

/** Slider Routes */
Route::resource('banner-feature', BannerFeatureController::class);
