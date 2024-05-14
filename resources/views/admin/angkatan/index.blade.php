@extends('layouts.app')
@section('tittle', 'Tabel Angkatan')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Angkatan</div>
            <div class="col-md-2 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahAngkatan" class="btn btn-info" title="Tambah Angkatan">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>KODE ANGKATAN</th>
                        <th>TAHUN ANGKATAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>24</td>
                        <td>2024</td>
                        <td>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target=".editAngkatan" title="Edit role"><i class="fa fa-pencil font-14"></i></button>
                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahAngkatan" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Angkatan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="id_angkatan" >Kode Angkatan</label>
                <input type="number" name="id_angkatan" class="form-control @error('id_angkatan') is-invalid @enderror" placeholder="Masukan Kode">
                @error('id_angkatan')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="tahun_angkatan" >Tahun Angkatan</label>
                <input type="number" name="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" placeholder="Masukan tahun angkatan">
                @error('tahun_angkatan')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade editAngkatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="id_angkatan" >Kode Angkatan</label>
                    <input type="number" name="id_angkatan" class="form-control @error('id_angkatan') is-invalid @enderror" value="24">
                    @error('id_angkatan')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="tahun_angkatan" >Tahun Angkatan</label>
                    <input type="number" name="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" value="2024" placeholder="Masukan tahun angkatan">
                    @error('tahun_angkatan')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
@endsection