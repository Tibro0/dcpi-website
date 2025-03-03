<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                    <h2 class="mb-0 text-nowrap mr-3">Our Diploma Engineering Course</h2>
                    <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                    <div>
                        <a href="courses.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see
                            all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- course list -->
        <div class="row justify-content-center">
            <!-- course item -->
            @foreach ($diplomaEngineeringCourses as $diplomaEngineeringCourse)
                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card p-0 border-primary rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{ asset($diplomaEngineeringCourse->image) }}"
                            alt="course thumb">
                        <div class="card-body">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item"><i
                                        class="ti-calendar mr-1 text-color"></i>{{ date('d-m-Y', strToTime($diplomaEngineeringCourse->created_at)) }}
                                </li>
                                {{-- <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li> --}}
                            </ul>
                            <a href="course-single.html">
                                <h4 class="card-title">{{ $diplomaEngineeringCourse->name }}</h4>
                            </a>
                            <p class="card-text mb-4">{{ $diplomaEngineeringCourse->short_description }}</p>
                            <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /course list -->
        <!-- mobile see all button -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="courses.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell
                    all</a>
            </div>
        </div>
    </div>
</section>
