<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <h2 class="section-title">{{ @$frontPageAboutUsSection->title }}</h2>
                <p>{!! @$frontPageAboutUsSection->description !!}</p>
                @if (@$frontPageAboutUsSection->button_name && @$frontPageAboutUsSection->button_url)
                    <a href="{{ @$frontPageAboutUsSection->button_url }}"
                        class="btn btn-primary-outline">{{ @$frontPageAboutUsSection->button_name }}</a>
                @endif
            </div>
            <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                <img class="img-fluid w-100" src="{{ asset(@$frontPageAboutUsSection->image) }}" alt="about image">
            </div>
        </div>
    </div>
</section>
