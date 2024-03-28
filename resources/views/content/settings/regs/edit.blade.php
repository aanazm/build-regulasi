@extends('layouts.default-app')

@section('title')
Regulasi Items - Edit
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
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="{{ route('settings-regs.update', $regs->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Units</label></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" disabled="disabled" id="disabledSelect">
                                                    <option>SIMRS</option>
                                                    <option>Administrasi Umum</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name-doc-column">Nama Dokumen</label>
                                            <input type="text" id="name-doc-column" value="{{ $peds->nm_dokumen }}" class="form-control" placeholder="Nama Dokumen" name="nm_dokumen">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="numb-doc-column">Nomor Dokumen</label>
                                            <input type="text" id="numb-doc-column" value="{{ $peds->no_dokumen }}" class="form-control" placeholder="Nomor" name="no_dokumen">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="date-ttp">Tanggal Di Tetapkan</label>
                                            <input type="date" id="date-ttp" class="form-control" value="{{ $peds->tgl_tetap }}" name="tgl_tetap">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="date-berlaku">Masa Berlaku</label>
                                            <input type="date" id="date-berlaku" class="form-control" value="{{ $peds->masa_berlaku }}" name="masa_berlaku">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="date-pengesahan">Tanggal Pengesahan</label>
                                            <input type="date" id="date-pengesahan" class="form-control" value="{{ $peds->tgl_pengesahan }}" name="tgl_pengesahan">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="input-grup-name">Nama Pengesah Dokumen</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" >Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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