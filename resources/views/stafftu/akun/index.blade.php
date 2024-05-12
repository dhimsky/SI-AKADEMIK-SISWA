@extends('layouts.app')
@section('tittle', 'Tabel Akun')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Akun</div>
            <div class="col-md-2 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahAkun" class="btn btn-info" title="Tambah Akun">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NAMA LENGKAP</th>
                        <th>ROLE</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>3428</td>
                        <td>Kontol Kuda</td>
                        <td>Wali Kelas</td>
                        <td>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target=".editAkun" title="Edit role"><i class="fa fa-pencil font-14"></i></button>
                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahAkun" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="nisn" >NISN</label>
                <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror">
                @error('nisn')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="nama_lengkap" >Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Masukan nama role">
                @error('nama_lengkap')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="role_id" >Role</label>
                <input type="text" name="role_id" class="form-control @error('role_id') is-invalid @enderror" placeholder="Masukan nama role">
                @error('role_id')
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

<div class="modal fade editAkun" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Akun</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="nisn" >NISN</label>
                    <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="1">
                    @error('nisn')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="nama_lengkap" >Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="Kontol Kuda" placeholder="Masukan nama role">
                    @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="role_id" >Role</label>
                    <input type="text" name="role_id" class="form-control @error('role_id') is-invalid @enderror" value="Wali Kelas" placeholder="Masukan nama role">
                    @error('role_id')
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