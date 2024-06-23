@extends('layouts.app')
@section('tittle', 'Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-body" style="">
                    <form action=" " method="post" class="form-horizontal">
                        @csrf
                        @foreach ($user as $u)
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Identitas</label>
                            <div class="col-sm-9">
                                <input value="{{ $u->kode_identitas }}" name="kode_identitas" class="form-control" type="number" placeholder="Masukan kode identitas" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input value="{{ $u->nama_lengkap }}" name="nama_lengkap" class="form-control" type="text" placeholder="Masukan nama lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Simpan</button>
                                <a href="" class="btn btn-warning text-white" data-toggle="modal" data-target=".akunSet{{ $u->kode_identitas }}">Ubah Password</a>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($user as $u)
<div class="modal fade akunSet{{ $u->kode_identitas }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="current_password" class="required-label faded-label">Password Lama</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password" placeholder="Masukan password lama">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password" class="required-label faded-label">Password Baru</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new-password" placeholder="Masukan password baru">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password_confirmation" class="required-label faded-label">Konfirmasi Password Baru</label>
                            <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" autocomplete="new-password" placeholder="Masukan password baru">
                            @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection