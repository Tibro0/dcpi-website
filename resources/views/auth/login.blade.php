@extends('frontend.layouts.master')

@push('frontend-css')
    <title>Educenter | Login</title>
@endpush

@section('frontend-content')
    <!-- Page title Start -->
    <section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="javascript:;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Page title End -->

    <!-- Page Content Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 shadow-lg p-5 bg-body rounded">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{ route('login') }}" method="POST" class="row">
                        @csrf
                        <div class="col-12">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-3"
                                placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                        </div>
                        <div class="col-6">
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label mt-1" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="text-right"><a href="{{ route('password.request') }}">Forgot Password ?</a></p>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content End -->
@endsection
