<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>HomePage Section</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
                    </li>
                    <li class="active"><a class="nav-link" href="{{ route('admin.banner-feature.index') }}">Banner
                            Feature</a>
                    </li>
                    <li class="active"><a class="nav-link"
                            href="{{ route('admin.front-page-about-us-section.index') }}">About Us
                            Section</a>
                    </li>
                    <li class="active"><a class="nav-link" href="{{ route('admin.front-page-cta-section.index') }}">Cta
                            Section</a>
                    </li>
                    <li class="active"><a class="nav-link"
                            href="{{ route('admin.front-page-success-story-section.index') }}">Success Story
                            Section</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Our Courses</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link"
                            href="{{ route('admin.diploma-engineering-course.index') }}">Diploma Course</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Our Event</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route('admin.event.index') }}">Events</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Our Teacher</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route('admin.teacher.index') }}">Teacher</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="#">Custom Page</a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="active"><a class="nav-link" href="#"><i class="fas fa-cogs"></i>
                    <span>Settings</span></a></li> --}}
        </ul>
    </aside>
</div>
