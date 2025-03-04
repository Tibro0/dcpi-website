@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Teacher</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Teacher</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Teacher</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image <code>(PNG Format Image)</code></label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $teacher->image }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" value="{{ $teacher->designation }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $teacher->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Whatsapp <code>(01xxxxxxxx)</code></label>
                                <input type="text" name="whatsapp" value="{{ $teacher->whatsapp }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Facebook ID Name</label>
                                <input type="text" name="facebook_id_name" value="{{ $teacher->facebook_id_name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" name="facebook_url" value="{{ $teacher->facebook_url }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Linkedin ID Name</label>
                                <input type="text" name="linkedin_id_name" value="{{ $teacher->linkedin_id_name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Linkedin URL</label>
                                <input type="text" name="linkedin_url" value="{{ $teacher->linkedin_url }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Twitter ID Name</label>
                                <input type="text" name="twitter_id_name" value="{{ $teacher->twitter_id_name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Twitter URL</label>
                                <input type="text" name="twitter_url" value="{{ $teacher->twitter_url }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Website URL</label>
                        <input type="text" name="website_url" value="{{ $teacher->website_url }}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $teacher->address }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Address URL <code>(Google Map Link)</code></label>
                                <input type="text" name="address_url" value="{{ $teacher->address_url }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <input type="text" name="short_description" value="{{ $teacher->short_description }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control summernote">{!! $teacher->long_description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Priority Number <code>(Serial Number (like = 1,2,3..))</code></label>
                        <input type="text" name="priority_number" value="{{ $teacher->priority_number }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected($teacher->status === 1) value="1">Active</option>
                            <option @selected($teacher->status === 0) value="0">InActive</option>
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
                'background-image': 'url({{ asset($teacher->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
