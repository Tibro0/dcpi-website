@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Event</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <!-- Data Picker css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Create Event</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Event</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image <code>(PNG Format Image)</code></label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location <code>(Dhanmondi, Dhaka)</code></label>
                        <input type="text" name="location" value="{{ old('location') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="date" value="{{ old('date') }}" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label>Time <code>(04:00 pm)</code></label>
                        <input type="text" name="time" value="{{ old('time') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Fee <code>(6000 Taka)</code></label>
                        <input type="text" name="fee" value="{{ old('fee') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <input type="text" name="short_description" value="{{ old('short_description') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control summernote">{!! old('long_description') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Priority Number <code>(Serial Number (like = 1,2,3..))</code></label>
                        <input type="text" name="priority_number" value="{{ old('priority_number') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- Data Picker js -->
    <script src="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
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
@endpush
