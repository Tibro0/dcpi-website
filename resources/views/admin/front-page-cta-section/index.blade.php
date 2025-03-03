@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | FrontPage Cta</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Front Page Cta Section</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Front Page Cta Section</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.front-page-cta-section.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Top Title</label>
                        <input type="text" name="top_title" value="{{ @$frontPageCtaSection->top_title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Main Title</label>
                        <input type="text" name="main_title" value="{{ @$frontPageCtaSection->main_title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Button Name</label>
                        <input type="text" name="button_name" value="{{ @$frontPageCtaSection->button_name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" name="button_url" value="{{ @$frontPageCtaSection->button_url }}"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
