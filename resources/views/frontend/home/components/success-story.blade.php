<section class="section bg-cover" data-background="{{ asset(@$frontPageSuccessStorySection->image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-4 position-relative success-video">
                @if (@$frontPageSuccessStorySection->video_link)
                    <a class="play-btn venobox" href="{!! @$frontPageSuccessStorySection->video_link !!}" data-vbtype="video">
                        <i class="ti-control-play"></i>
                    </a>
                @endif
            </div>
            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">{!! $frontPageSuccessStorySection->title !!}</h2>
                    <p>{!! $frontPageSuccessStorySection->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
