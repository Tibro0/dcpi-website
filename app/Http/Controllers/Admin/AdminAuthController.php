<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function forgetPassword() {
        return view('admin.auth.forget-password');
    }
}
