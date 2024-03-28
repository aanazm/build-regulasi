@extends('layouts.default-app')

@section('title')
Keputusan Direktur
@endsection

@section('content')
<div class="content-wrapper container">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                    <p class="text-subtitle text-muted">Sebelum menambahkan Regulasi Baru Pastikan Nomor dokumen tidak dipakai</p>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                        <ol class="breadcrumb">
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                Filter
                            </button>
                            <a href="{{ route('keputusan-direktur.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Tambah Item</a>
                        </ol>
                        <!-- pop up item start-->
                        <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog mt-lg-10">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Filter Data</h5>
                                        <i class="fas fa-upload ms-3"></i>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="#">
                                        <div class="modal-body">
                                            <h6>Unit</h6>
                                            <div class="form-group">
                                                <select name="" class="choices form-select multiple-remove" multiple="multiple">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <button type="Submit" class="btn bg-gradient-primary btn-sm">Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- pop up item finish-->
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center  flex-column">
                                <div class="table-responsive">
                                    <table class="table " id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dokumen</th>
                                                <th>Tanggal Di Tetapkan</th>
                                                <th>Masa Berlaku</th>
                                                <th>Tanggal Pengesahan</th>
                                                <th>Nama yang Pengesah Dokumen</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $dtkd)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <th>{{ $dtkd->name }} {{ $dtkd->numb }}</th>
                                                <th>{{ $dtkd->akta ? $dtkd->akta->akta : '-' }}</th>
                                                <td></td>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div>
                                                        <a class="btn btn-transtaparant" href="{{ route('keputusan-direktur.edit', $dtkd->id) }}"><i class="bi bi-pencil"></i></a>

                                                    </div>
                                                    <div>
                                                        {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['keputusan-direktur.destroy', $dtkd->id],
                                                        'style' => 'display:inline',
                                                        ]) !!}
                                                        {{ Form::button('<i class="bi bi-trash icon-size"></i>', ['type' => 'submit', 'class' => 'btn btn-transtaparant']) }}
                                                        {!! Form::close() !!}

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection