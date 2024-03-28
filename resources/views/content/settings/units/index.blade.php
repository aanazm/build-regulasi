@extends('layouts.default-app')

@section('title')
Units
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
                            <a href="{{ route('settings-units.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Tambah Item</a>
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
                            <div class="d-flex justify-content-center  flex-column">
                                <div class="table-responsive">
                                    <table class="table " id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($UnitDatas as $index => $UnitDatas)
                                            <tr>
                                                <td> {{ $index + 1 }}</td>
                                                <td> {{ $UnitDatas->name }} </td>
                                                <td>
                                                    <div>
                                                        <a class="btn btn-transtaparant" href="{{ route('settings-units.edit', $UnitDatas->id) }}"><i class="bi bi-pencil"></i></a>
                                                        {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['settings-units.destroy', $UnitDatas->id],
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