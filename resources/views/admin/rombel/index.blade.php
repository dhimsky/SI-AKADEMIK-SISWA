@extends('layouts.app')
@section('tittle', 'Rombel')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Rombel</div>
            <div class="col-md-2 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahRombel" class="btn btn-info" title="Tambah Rombel">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>KODE ROMBEL</th>
                        <th>NAMA ROMBEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>JMK</td>
                        <td>JOMOK</td>
                        <td>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target=".editRombel" title="Edit rombel"><i class="fa fa-pencil font-14"></i></button>
                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahRombel" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Rombel</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="id_rombel" >Kode Rombel</label>
                <input type="text" name="id_rombel" class="form-control @error('id_rombel') is-invalid @enderror" placeholder="Masukan Kode">
                @error('id_rombel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="nama_rombel" >Nama Rombel</label>
                <input type="text" name="nama_rombel" class="form-control @error('nama_rombel') is-invalid @enderror" placeholder="Masukan nama rombel">
                @error('nama_rombel')
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

<div class="modal fade editRombel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Rombel</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="id_rombel" >Kode Rombel</label>
                    <input type="text" name="id_rombel" class="form-control @error('id_rombel') is-invalid @enderror" value="JMK">
                    @error('id_rombel')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="nama_rombel" >Nama Rombel</label>
                    <input type="text" name="nama_rombel" class="form-control @error('nama_rombel') is-invalid @enderror" value="JOMOK" placeholder="Masukan nama role">
                    @error('nama_rombel')
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