@extends('frontend.layouts.master')

@push('frontend-css')
    <title>Educenter | Forgot Password</title>
@endpush

@section('frontend-content')
    <!-- Page title Start -->
    <section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="javascript:;">Forgot
                                Password</a>
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
                    <h2 class="text-center mb-4">Forgot Password</h2>
                    <form action="{{ route('password.email') }}" method="POST" class="row">
                        @csrf
                        <div class="col-12">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-3"
                                placeholder="Email">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Verify Email</button>
                        </div>
                        <div class="col-6">
                            <p class="text-right"><a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content End -->
@endsection
