@extends('layouts.default-app')

@section('title')
Roles Create
@endsection

@section('content')
<div class="content-wrapper container">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                        <ol class="breadcrumb">
                            <a href="{{ route('role-setting.index') }}" class="btn icon icon-left btn-info btn-sm mb-0"><i data-feather="info"></i>Lihat Semua Role</a>
                        </ol>
                    </nav>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <role></role>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection