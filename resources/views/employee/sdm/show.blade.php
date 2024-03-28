@extends('layouts.default-app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Equipment Type</h2>
        </div>
    </div>
</div>

<div class="page-heading">
    <div class="page-title">
        <div class="card-header pb-0">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0"></h5>
                    <p class="text-sm mb-0">
                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                    </p>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <a class="btn btn-primary" href="{{ route('itemequipment.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detailed Item</h4>
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Model:</strong>
                        {{ $Items_Equipment->model }}
                    </div>
                    <div class="form-group">
                        <strong>Jenis Peralatan:</strong>
                        {{ $Items_Equipment->type ? $Items_Equipment->type->type : '-' }}
                    </div>
                    <div class="form-group">
                        <strong>Tahun Pembelian/Pembuatan:</strong>
                        {{ $Items_Equipment->year }}
                    </div>
                    <div class="form-group">
                        <strong>Kapasitas:</strong>
                        {{ $Items_Equipment->capacity }}
                    </div>
                    <div class="form-group">
                        <strong>Lokasi:</strong>
                        {{ $Items_Equipment->location }}
                    </div>
                    <div class="form-group">
                        <strong>Kondisi:</strong>
                        {{ $Items_Equipment->condition ? $Items_Equipment->condition->condition : '-' }}
                    </div>
                    <div class="form-group">
                        <strong>Kepemilikan:</strong>
                        {{ $Items_Equipment->ownership ? $Items_Equipment->ownership->ownership : '-' }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection