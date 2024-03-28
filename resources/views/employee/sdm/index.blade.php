@extends('layouts.default-app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>SDM</h3>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SDM</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Information About Resource</h5>
                                <p class="text-sm mb-0">
                                A quality project supported by great personnel.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
              
                                    <a href="{{ route('pegawai-sdm.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Tambah Item</a>
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                        Filter
                                    </button>
         
                                    <!-- pop up item start-->
                                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-lg-10">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Filter Data</h5>
                                                    <i class="fas fa-upload ms-3"></i>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('pegawai-sdm.index') }}">
                                                    <div class="modal-body">
                                                        <h6>Pendidikan</h6>
                                                        <div class="form-group">
                                                            <select name="sdm_educations[]" class="choices form-select multiple-remove" multiple="multiple">
                                                                @foreach ($educations as $education)
                                                                <option value="{{ $education->id }}" {{ in_array($education->id, $filters) ? 'selected' : '' }}>

                                                                    {{ $education->education }}
                                                                </option>
                                                                @endforeach
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
                                    <!-- <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sdms as $index => $sdm)
                                            <tr>
                                                <td>
                                                    {{ $index + 1 }}
                                                </td>
                                                <td>
                                                    {{ $sdm->name }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($sdm->SdmEdu as $sdmEdu)
                                                        <li>
                                                            {{ $sdmEdu->educations->educations }},
                                                            {{ $sdmEdu->name }}
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a class="btn btn-transtaparant" href="{{ route('pegawai-sdm.show', $sdm->id) }}"><i class="bi bi-eye"></i></a>
                                                        
                                                        <a class="btn btn-transtaparant" href="{{ route('pegawai-sdm.edit', $sdm->id) }}"><i class="bi bi-pencil"></i></a>
                                                        
                                                    </div>
                                                    <div>
                                                        {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['pegawai-sdm.destroy', $sdm->id],
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
                    </section>
                    <!-- Basic Tables end -->
                </div>
            </div>
        </div>
    </div>
    @endsection