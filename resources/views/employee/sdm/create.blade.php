@extends('layouts.default-app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Item</h2>
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

<div class="row">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0">Information About Resource</h5>
                    <p class="text-sm mb-0">
                        A quality project supported by great personnel.
                    </p>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <a class="btn btn-primary" href="{{ route('pegawai-sdm.index') }}"> Back</a>
                </div>
                <!-- pop up item start-->
                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog mt-lg-10">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                <i class="fas fa-upload ms-3"></i>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>You can browse your computer for a file.</p>
                                <input type="text" placeholder="Browse file..." class="form-control mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                                    <label class="custom-control-label" for="importCheck">I accept the terms and
                                        conditions</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pop up item finish-->
                <!-- <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> -->
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form" action="{{ route('pegawai-sdm.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <h6>Nama</h6>
                    <input type="text" id="name-floating" class="form-control" name="sdm_name" placeholder="Nama">
                    <br>

                    <h6>NIK</h6>
                    <input type="text" id="nik-floating" class="form-control" name="sdm_nik" placeholder="Nomor Induk Kependukan">
                    <br>

                    <h6>NPWP</h6>
                    <input type="text" id="npwp-floating" class="form-control" name="sdm_npwp" placeholder="Nomor Penduduk Wajib Pajak">
                    <br>

                    <h6>Pendidikan</h6>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <select class="form-select" name="sdm_educations[0]" class="form-control @error('sdm_educations[0]') is-invalid @enderror">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach ($educations as $education)
                                    <option value="{{ $education->id }}" {{ old('sdm_educations[0]') == $education->id ? 'selected' : null }}>
                                        {{ $education->education }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <input type="text" id="collage-floating" class="form-control" name="name[0]" placeholder="Masukkan Nama Instansi Pendidkan">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <button type="button" class="btn btn-primary me-1 mb-1" onclick="onAddEducation()">Tambah</button>
                        </div>
                    </div>
                    <div id="education">
                    </div>
                    <h6>Domisili</h6>
                    <input type="text" id="doms-floating" class="form-control" name="sdm_domisli" placeholder="Masukkan Domisili">
                    <br>


                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    let total = 1
    const onAddEducation = () => {
        $("#education").append(`
        <div class="row" id="education-${total}">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <select class="form-select" name="sdm_educations[${total}]"
                    class="form-control @error('sdm_educations[${total}]') is-invalid @enderror">
                    <option value="">Pilih Tingkat</option>
                    @foreach ($educations as $education)
                    <option value="{{ $education->id }}"
                    {{ old('sdm_educations[${total}]') == $education->id ? 'selected' : null }}>
                    {{ $education->education }}
                    </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <input type="text" id="country-floating" class="form-control" name="name[${total}]"
                    placeholder="Nama Instansi Sekolah">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <button type="button" class="btn btn-primary me-1 mb-1"
                onclick="onAddEducation()">Tambah</button>
                <button onclick="onRemoveEducation(${total})" type="button" class="btn btn-danger me-1 mb-1">Hapus</button>
            </div>
        </div>
            `)
        total++
    }

    const onRemoveEducation = (id) => {
        $(`#education-${id}`).remove()
    }
</script>





@endsection