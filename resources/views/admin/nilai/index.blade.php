@extends('layouts.app')
@section('tittle', 'Tabel Nilai Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Siswa</div>
                <div class="col-md-9 mt-4 text-right">
                    <form action="" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-1">
                                <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 text-right ">
                    <a href="{{ route('admin.tambah-nilai') }}" class="btn btn-info"
                        title="Tambah Nilai">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NAMA SISWA</th>
                            <th>MAPEL</th>
                            <th>SEMESTER</th>
                            <th>NILAI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @foreach ($nilai as $n)
                            <td>{{ $n->nisn_id }}</td>
                            <td>{{ $n->siswa->nama_siswa }}</td>
                            <td>{{ $n->mapel_kode->nama_mapel }}</td>
                            <td>{{ $n->semester }}</td>
                            <td>{{ $n->value }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                    data-target=".editNilai" title="Edit Siswa"><i
                                        class="fa fa-pencil font-14"></i></button>
                                <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade editNilai" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nisn_id">NISN</label>
                                                        <input type="number" name="nisn_id"
                                                            class="form-control @error('nisn_id') is-invalid @enderror" placeholder="Masukan NISN" value="{{ $s->nisn_id }}">
                                                        @error('nisn_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="mapel_kode">Angkatan</label>
                                                        <select class="form-control input-sm @error('mapel_kode') is-invalid @enderror" name="mapel_kode">
                                                            @foreach ($mapel as $m)
                                                            <option value="{{ $m->kode_mapel }}" {{ $m->kode_mapel === $s->mapel_kode ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('mapel_kode')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="value">Nilai</label>
                                                        <input type="number" name="value"
                                                            class="form-control @error('value') is-invalid @enderror" placeholder="Masukan Nilai" value="{{ $s->value }}">
                                                        @error('value')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div class="modal fade tambahNilai" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Nama Siswa</label>
                                    <select class="form-control select2_demo_2" name="nisn_id">
                                        @foreach ($siswa as $m)
                                            <option value="{{ $m->nisn }}">{{ $m->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="mapel_kode">Mapel</label>
                                    <select class="form-control input-sm" name="mapel_kode" value="{{ old('mapel_kode') }}">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapel as $m)
                                            <option value="{{ $m->kode_mapel }}">{{ $m->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel_kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="value">Nilai</label>
                                    <input type="number" name="value"
                                        class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}" placeholder="Masukan Nilai">
                                    @error('value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('validasi.validasi-edit')
    @include('validasi.notifikasi-berhasil')

    

    
    @endsection
