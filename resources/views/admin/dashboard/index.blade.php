@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Dashboard</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-cart-plus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Todays Orders</h4>
                        </div>
                        <div class="card-body">
                            500
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
