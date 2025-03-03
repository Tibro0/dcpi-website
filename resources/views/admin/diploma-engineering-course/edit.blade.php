@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Diploma Engineering Course</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Diploma Engineering Course</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Diploma Engineering Course</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.diploma-engineering-course.update', $diplomaEngineeringCourse->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image <code>(PNG Format Image)</code></label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $diplomaEngineeringCourse->image }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $diplomaEngineeringCourse->name }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Month <code>(06 Month)</code></label>
                        <input type="text" name="month" value="{{ $diplomaEngineeringCourse->month }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Duration <code>(03 Hours)</code></label>
                        <input type="text" name="duration" value="{{ $diplomaEngineeringCourse->duration }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Course Fee <code>(6000 Taka)</code></label>
                        <input type="text" name="course_fee" value="{{ $diplomaEngineeringCourse->course_fee }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <input type="text" name="short_description"
                            value="{{ $diplomaEngineeringCourse->short_description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control summernote">{!! $diplomaEngineeringCourse->long_description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Priority Number <code>(Serial Number (like = 1,2,3..))</code></label>
                        <input type="text" name="priority_number"
                            value="{{ $diplomaEngineeringCourse->priority_number }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected($diplomaEngineeringCourse->status === 1) value="1">Active</option>
                            <option @selected($diplomaEngineeringCourse->status === 0) value="0">InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <!-- image-preview js -->
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($diplomaEngineeringCourse->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
