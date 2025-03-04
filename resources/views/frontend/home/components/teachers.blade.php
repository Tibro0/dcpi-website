<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title">Our Teachers</h2>
            </div>
            <!-- teacher -->
            @foreach ($teachers as $teacher)
                <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div class="card border-0 rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{ asset($teacher->image) }}" alt="teacher">
                        <div class="card-body">
                            <a href="teacher-single.html">
                                <h4 class="card-title">{{ $teacher->name }}</h4>
                            </a>
                            <p>{{ $teacher->designation }}</p>
                            <ul class="list-inline">
                                @if ($teacher->facebook_url)
                                    <li class="list-inline-item"><a class="text-color" target="_blank"
                                            href="{{ $teacher->facebook_url }}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if ($teacher->whatsapp)
                                    <li class="list-inline-item h6"><a class="text-color" target="_blank"
                                            href="{{ $teacher->whatsapp }}"><i class="fa-brands fa-whatsapp"></i></a>
                                    </li>
                                @endif
                                @if ($teacher->twitter_url)
                                    <li class="list-inline-item"><a class="text-color" target="_blank"
                                            href="{{ $teacher->twitter_url }}"><i class="ti-twitter-alt"></i></a></li>
                                @endif
                                @if ($teacher->linkedin_url)
                                    <li class="list-inline-item"><a class="text-color" target="_blank"
                                            href="{{ $teacher->linkedin_url }}"><i class="ti-linkedin"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
