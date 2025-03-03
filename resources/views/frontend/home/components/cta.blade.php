<section class="section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h6 class="text-white font-secondary mb-0">{{ @$frontPageCtaSection->top_title }}</h6>
                <h2 class="section-title text-white">{{ @$frontPageCtaSection->main_title }}</h2>
                @if (@$frontPageCtaSection->button_name && @$frontPageCtaSection->button_url)
                    <a href="{{ @$frontPageCtaSection->button_url }}"
                        class="btn btn-secondary">{{ @$frontPageCtaSection->button_name }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
