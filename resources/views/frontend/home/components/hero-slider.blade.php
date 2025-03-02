<section class="hero-section overlay bg-cover" data-background="images/banner/banner-1.jpg">
    <div class="container">
        <div class="hero-slider">
            <!-- slider item -->
            @foreach ($sliders as $slider)
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5"
                                data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">
                                {{ $slider->title }}</h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5"
                                data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">
                                {{ $slider->description }}</p>
                            @if ($slider->button_text && $slider->button_url)
                                <a href="{{ $slider->button_url }}" class="btn btn-primary"
                                    data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3"
                                    data-animation-in="fadeInLeft" data-delay-in=".7">{{ $slider->button_text }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
