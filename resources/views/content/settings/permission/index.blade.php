@extends('layouts.default-app')

@section('title')
Pemission Settings
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
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                Filter
                            </button>
                            <a href="{{ route('permission-setting.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Tambah Item</a>
                        </ol>
                    </nav>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        <th>Posted</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permission as $data)
                                    <tr>
                                        <td>{{ $data->id}}</td>
                                        <td>{{ $data->name}}</td>
                                        <td>{{ $data->create_at}}</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            No result Found
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
@endsection