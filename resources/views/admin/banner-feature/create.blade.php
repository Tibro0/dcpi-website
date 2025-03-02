@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Banner Feature</title>
    <!-- Bootstrap Iconpicker CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Create Banner Feature</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Banner Feature</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-feature.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Icon</label><br>
                        <button name="icon" class="btn btn-primary" data-selected-class="btn-danger"
                            data-unselected-class="btn-info" role="iconpicker"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control">
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
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.js') }}"></script>
@endpush
