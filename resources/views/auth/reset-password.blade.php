@extends('frontend.layouts.master')

@push('frontend-css')
    <title>Educenter | Reset Password</title>
@endpush

@section('frontend-content')
    <!-- Page title Start -->
    <section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="javascript:;">Reset
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
                    <h2 class="text-center mb-4">Reset Password</h2>
                    <form action="{{ route('password.store') }}" method="POST" class="row">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="col-12">
                            <input type="email" name="email" value="{{ old('email', $request->email) }}"
                                class="form-control mb-3" placeholder="Email">
                        </div>

                        <div class="col-12">
                            <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                        </div>

                        <div class="col-12">
                            <input type="password" name="password_confirmation" class="form-control mb-3"
                                placeholder="Confirm Password">
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content End -->
@endsection
