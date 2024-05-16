@extends('layouts.app')
@section('tittle', 'Tabel Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Siswa</div>
                <div class="col-md-2 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahSiswa" class="btn btn-info"
                        title="Tambah Siswa">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>FOTO</th>
                            <th>NIS</th>
                            <th>NAMA LENGKAP</th>
                            <th>JURUSAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                                <img src="{{ asset('/') }}assets/images/profile.jpeg" alt="Foto Mahasiswa" class="img-fluid img-3x4 rounded" style="max-width: 50px;">
                            </td>
                            <td>2103</td>
                            <td>Dinda Dewi Palo</td>
                            <td>Teknik Komputer Jaringan</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                    data-target=".editSiswa" title="Edit Siswa"><i
                                        class="fa fa-pencil font-14"></i></button>
                                <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade editSiswa" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Wali Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nis">NIS</label>
                                                <input type="text" name="nis"
                                                    class="form-control @error('nis') is-invalid @enderror" value="21023" placeholder="Masukan NIS">
                                                @error('nis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nama_siswa">Nama Lengkap</label>
                                                <input type="text" name="nama_siswa"
                                                    class="form-control @error('nama_siswa') is-invalid @enderror" value="Harun"
                                                    placeholder="Masukan Nama Lengkap">
                                                @error('nama_siswa')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control input-sm">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="kelas_id">Sebagai Wali Kelas</label>
                                                <select class="form-control input-sm">
                                                    <option value="11-TKJ-2">11-TKJ-2</option>
                                                </select>
                                                @error('kelas_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- Masuk ke database user (Nama Lengkap Juga) --}}
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="email">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror" value="harun@gmail.com" placeholder="Masukan email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"  placeholder="Masukan password baru">
                                                <small class="text-warning">*Kosongkan password jika tidak ingin mengubah.</small>
                                                @error('password')
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade tambahSiswa" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Wali Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nis">NIS</label>
                            <input type="text" name="nis"
                                class="form-control @error('nis') is-invalid @enderror" placeholder="Masukan NIS">
                            @error('kode_mapel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nama_siswa">Nama Lengkap</label>
                            <input type="text" name="nama_siswa"
                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                            @error('nama_siswa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control input-sm">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="kelas_id">Sebagai Wali Kelas</label>
                            <select class="form-control input-sm">
                                <option value="11-TKJ-2">11-TKJ-2</option>
                            </select>
                            @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Masuk ke database user (Nama Lengkap Juga) --}}
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="email">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"  placeholder="Masukan password baru">
                            @error('password')
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
    @include('validasi.validasi-edit')
    @include('validasi.notifikasi-berhasil')
@endsection
