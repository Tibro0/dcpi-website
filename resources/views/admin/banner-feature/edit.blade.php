@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Banner Feature</title>
    <!-- Bootstrap Iconpicker CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Banner Feature</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Banner Feature</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-feature.update', $bannerFeature->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label><br>
                        <button name="icon" data-icon="{{ $bannerFeature->icon }}" class="btn btn-primary"
                            data-selected-class="btn-danger" data-unselected-class="btn-info" role="iconpicker"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $bannerFeature->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ $bannerFeature->description }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected($bannerFeature->status === 1) value="1">Active</option>
                            <option @selected($bannerFeature->status === 0) value="0">InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.js') }}"></script>
@endpush
