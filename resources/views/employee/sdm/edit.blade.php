@extends('layouts.default-app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Equipment Type</h2>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('pegawai-sdm.update', $sdm->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0"></h5>
                        <p class="text-sm mb-0">
                            A lightweight, extendable, dependency-free javascript HTML table plugin.
                        </p>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <a class="btn btn-primary" href="{{ route('pegawai-sdm.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Name</label>
                            <input type="text" name="sdm_name" value="{{ $sdm->name }}" class="form-control">
                        </div>
                    </div>
                    <h6>Bendera</h6>
                    @foreach ($sdm->SdmEdu as $index => $sdmEdu)
                    <div class="row" id="education-{{ $sdmEdu->id }}">
                        <input type="hidden" name="sdm_edus[]" value="{{ $sdmEdu->id}}">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <input type="text" id="country-floating" class="form-control" name="name[]" placeholder="name" value="{{ $sdmEdu->name }}" >
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <button type="button" class="btn btn-primary me-1 mb-1" onclick="onAddEducation()">Tambah</button>
                            <button onclick="onRemoveEducation( {{ $sdmEdu->id }} )" type="button" class="btn btn-danger me-1 mb-1" disabled>Hapus</button>
                        </div>
                    </div>
                    @endforeach

                    <div id="education">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
</form>
</div>
</div>
</div>
</form>

<script>
    let total = 1
    const onAddEducation = () => {
        $("#education").append(`
            <div class="row" id="new-education-${total}">
            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <select class="form-select" name="new_sdm_educations[]"
                                        class="form-control @error('new_sdm_educations[]') is-invalid @enderror">
                                        <option value="">Pilih Kondisi</option>
                                        @foreach ($educations as $education)
                                            <option value="{{ $education->id }}"
                                                {{ old('sdm_educations[]') == $education->id ? 'selected' : null }}>
                                                {{ $education->education }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <input type="text" id="country-floating" class="form-control" name="new_name[]"
                                        placeholder="name">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <button type="button" class="btn btn-primary me-1 mb-1"
                                    onclick="onAddEducation()">Tambah</button>
                                    <button onclick="onRemoveNewEducation(${total})" type="button" class="btn btn-danger me-1 mb-1">Hapus</button>
                            </div>
                            </div>
            `)
        total++
    }

    const onRemoveEducation = (id) => {
        $(`#education-${id}`).remove()
    }

    const onRemoveNewEducation = (id) => {
        $(`#new-education-${id}`).remove()
    }
</script>
@endsection