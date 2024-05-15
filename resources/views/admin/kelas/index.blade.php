@extends('layouts.app')
@section('tittle', 'Kelas')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Kelas</div>
            <div class="col-md-2 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahKelas" class="btn btn-info" title="Tambah Kelas">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NAMA KELAS</th>
                        <th>TINGKAT</th>
                        <th>JURUSAN</th>
                        <th>ROMBEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>11-TKJ-2</td>
                        <td>11</td>
                        <td>Teknik Komputer Jaringan</td>
                        <td>2</td>
                        <td>
                            <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target=".editKelas" title="Edit Kelas"><i class="fa fa-pencil font-14"></i></button>
                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahKelas" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="tingkat" >Tingkat</label>
                <select class="form-control input-sm">
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                </select>
                @error('tingkat')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="jurusan_id" >Jurusan</label>
                <select class="form-control input-sm" name="jurusan_id">
                    <option value="">Teknik Komputer Jaringan</option>
                </select>
                @error('jurusan_id')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="rombel_id" >Rombel</label>
                <select class="form-control input-sm" name="rombel_id">
                    <option value="">2</option>
                </select>
                @error('rombel_id')
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

<div class="modal fade editKelas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="tingkat" >Tingkat</label>
                    <select class="form-control input-sm">
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                    @error('tingkat')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="jurusan_id" >Nama Jurusan</label>
                    <select class="form-control input-sm" name="jurusan_id">
                        <option value="">Teknik Komputer Jaringan</option>
                    </select>
                    @error('jurusan_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="required-label faded-label" for="rombel_id" >Rombel</label>
                    <select class="form-control input-sm" name="rombel_id">
                        <option value="">2</option>
                    </select>
                    @error('rombel_id')
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