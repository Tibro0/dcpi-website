@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | FrontPage Success Story</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Front Page Success Story Section</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Front Page Success Story Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.front-page-success-story-section.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image <code>(PNG Format Image)</code></label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ @$frontPageSuccessStorySection->image }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Video Link <code>(Youtube Video Link)</code></label>
                        <input type="text" name="video_link" value="{{ @$frontPageSuccessStorySection->video_link }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ @$frontPageSuccessStorySection->title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ @$frontPageSuccessStorySection->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
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
                'background-image': 'url({{ asset(@$frontPageSuccessStorySection->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
