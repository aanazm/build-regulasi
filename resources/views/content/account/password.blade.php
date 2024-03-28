@extends('layouts.default-app')

@section('title')
Profile Akun
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
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{ asset('dist/assets/compiled/jpg/2.jpg') }}" alt="Avatar">
                                </div>
                                <h5 class="mt-3">{{ auth()->user()->name }}</h5>
                                <p class="text-small">Junior Software Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('userPostPassword') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="newpassword">Enter New Password</label>
                                            <input type="password" name="newpassword" id="newpassword" class="form-control @error('newpassword') is-invalid @enderror" value="" required placeholder="New Password">
                                            @error('newpassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="newpassword_confirmation">Confirm New Password</label>
                                            <input type="password" name="newpassword_confirmation" id="newpassword_confirmation" class="form-control @error('newpassword_confirmation') is-invalid @enderror" value="" required placeholder="Confirm Password">
                                            @error('newpassword_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> Change Password</button>
                                            {{-- <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection