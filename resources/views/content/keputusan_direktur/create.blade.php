@extends('layouts.default-app')

@section('title')
keputusan_direktur - Create
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
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="{{ route('keputusan-direktur.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Units</label></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="unit" class="form-control @error('unit') is-invalid @enderror">
                                                    <option value="">Pilih</option>
                                                    @foreach ($unit as $unit)
                                                    <option value="{{ $unit->id }}" {{ old('unit') == $unit->id ? 'selected' : null }}>
                                                        {{ $unit->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            <!-- <input type="hidden" id="name-doc-column" class="form-control" value="1" name="menu"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name-doc-column">Nama Dokumen</label>
                                            <input type="text" id="name-doc-column" class="form-control" placeholder="Nama Dokumen" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="numb-doc-column">Nomor Dokumen</label>
                                            <input type="text" id="numb-doc-column" class="form-control" placeholder="Nomor" name="numb">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="date-ttp">Tanggal Di Tetapkan</label>
                                            <input type="date" id="date-ttp" class="form-control" name="tgl_tetap">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="date-berlaku">Masa Berlaku</label>
                                            <input type="date" id="date-berlaku" class="form-control" name="masa_berlaku">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="date-pengesahan">Tanggal Pengesahan</label>
                                            <input type="date" id="date-pengesahan" class="form-control" name="tgl_pengesahan">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group col-12">
                                            <label for="date-pengesahan">File</label>
                                            <input type="file" id="file-doc" class="form-control" name="file">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1 col-12">
                                        <div class="form-group">
                                            <label for="date-pengesahan" style="color:white">asd</label>
                                            <a class="btn btn-transtaparant" onclick="onAddItems()"><i class="bi bi-plus-square"></i></a>
                                        </div>
                                    </div> -->
                                    <div id="items">
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
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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


<script>
    let total = 1
    const onAddItems = () => {
        $("#items").append(`
        <div class="row" id="items-${total}">
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <input type="date" id="date-ttp" class="form-control" name="tgl_tetap[${total}]">
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <input type="date" id="date-berlaku" class="form-control" name="masa_berlaku[${total}]">
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="form-group">
                    <input type="date" id="date-pengesahan" class="form-control" name="tgl_pengesahan[${total}]">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group col-12">
                    <input type="file" id="file-doc" class="form-control" name="file[${total}]">
                </div>
            </div>
            <div class="col-md-1 col-12">
                <a class="btn btn-transtaparant" onclick="onAddItems()"><i class="bi bi-plus-square"></i></a>
            </div>
            <div class="col-md-1 col-12">
                <a class="btn btn-transtaparant" onclick="onRemoveitems(${total})"><i class="bi bi-trash3-fill"></i></i></a>
            </div>
        </div>
            `)
        total++
    }

    const onRemoveitems = (id) => {
        $(`#items-${id}`).remove()
    }
</script>

@endsection