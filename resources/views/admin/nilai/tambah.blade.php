@extends('layouts.app')
@section('tittle', 'Tambah Nilai Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.store-nilai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Nama Siswa</label>
                                        <select class="form-control select2_demo_2" name="nis_id">
                                            <option value="">--Pilih Siswa--</option>
                                            @foreach ($siswa as $m)
                                                <option value="{{ $m->nis }}">{{ $m->nama_siswa }}</option>
                                            @endforeach
                                        </select>
                                        @error('nisn_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Mata Pelajaran</label>
                                        <select class="form-control select2_demo_2" name="mapel_kode">
                                            <option value="">--Pilih Mapel--</option>
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
                        <div class="d-flex w-100">
                            <a href="{{ route('admin.nilai') }}" class="btn btn-secondary mr-auto">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
