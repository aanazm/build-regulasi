@extends('layouts.default-app')

@section('title')
Roles Settings
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
                            <a href="{{ route('role-setting.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Tambah Item</a>
                        </ol>
                    </nav>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1" border="4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Date Posted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role )
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission )
                                            <button class="btn btn-warning" role="button"><i class="fas fa-shield-alt"></i> {{ $permission->name }}</button>
                                            @endforeach
                                        </td>
                                        <td><span class="tag tag-success">{{ $role->created_at }}</span></td>
                                        {{-- <td>
                                        <a href="{{ route('role-setting.show', $role->id ) }}" class="btn btn-info">Change Permission</a>
                                        <a href="{{ role-setting('role.destroy',$role->id ) }}" class="btn btn-danger">Delete</a>
                                        </td> --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td><i class="fas fa-folder-open"></i> No Record found</td>
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