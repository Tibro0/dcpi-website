@extends('frontend.layouts.master')

@push('frontend-css')
    <title>Educenter | Home</title>
@endpush

@section('frontend-content')
    <!-- hero slider Start -->
    @include('frontend.home.components.hero-slider')
    <!-- hero slider End -->

    <!-- banner-feature Start -->
    @include('frontend.home.components.banner-feature')
    <!-- banner-feature End -->

    <!-- about us Start -->
    @include('frontend.home.components.about-us')
    <!-- about us End -->

    <!-- courses Start -->
    @include('frontend.home.components.courses')
    <!-- courses End -->

    <!-- cta Start -->
    @include('frontend.home.components.cta')
    <!-- cta End -->

    <!-- success story Start -->
    @include('frontend.home.components.success-story')
    <!-- success story End -->

    <!-- events Start -->
    @include('frontend.home.components.events')
    <!-- events End -->

    <!-- teachers Srart -->
    @include('frontend.home.components.teachers')
    <!-- teachers End -->

    <!-- blog Start -->
    @include('frontend.home.components.blog')
    <!-- blog End -->
@endsection
