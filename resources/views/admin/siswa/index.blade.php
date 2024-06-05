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
                            <th>NISN</th>
                            <th>NAMA LENGKAP</th>
                            <th>JURUSAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            {{-- <td>
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
                            </td> --}}
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade editSiswa" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nisn">NISN</label>
                                                        <input type="text" name="nisn"
                                                            class="form-control @error('nisn') is-invalid @enderror" placeholder="Masukan NISN">
                                                        @error('nisn')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nama_siswa">Nama Lengkap</label>
                                                        <input type="text" name="nama_siswa"
                                                            class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('') }}"
                                                            placeholder="Masukan Nama Lengkap">
                                                        @error('nama_siswa')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pas_foto">Pas Foto</label>
                                                        <input type="file" name="pas_foto"
                                                            class="form-control-file @error('pas_foto') is-invalid @enderror">
                                                        @error('pas_foto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                        <select class="form-control input-sm @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                                            <option value="{{ old('') }}">-- Pilih Jenis Kelamin --</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kelas_id">Kelas</label>
                                                        <select class="form-control input-sm @error('kelas_id') is-invalid @enderror" name="kelas_id">
                                                            <option value="">-- Pilih Kelas --</option>
                                                            <option value="TKJ">Teknik Komputer Jaringan</option>
                                                        </select>
                                                        @error('kelas_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="status_siswa">Status Siswa</label>
                                                        <input type="text" name="status_siswa"
                                                            class="form-control @error('status_siswa') is-invalid @enderror" value=""
                                                            placeholder="Masukan Status Siswa">
                                                        @error('status_siswa')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tempat_lahir">Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir"
                                                            class="form-control @error('tempat_lahir') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tempat Lahir">
                                                        @error('tempat_lahir')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tgl_lahir">Tanggal Lahir</label>
                                                        <input type="date" name="tgl_lahir"
                                                            class="form-control @error('tgl_lahir') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tanggal Lahir">
                                                        @error('tgl_lahir')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="agama">Agama</label>
                                                        <input type="text" name="agama"
                                                            class="form-control @error('agama') is-invalid @enderror" value=""
                                                            placeholder="Masukan Agama">
                                                        @error('agama')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="alamat">Alamat</label>
                                                        <input type="text" name="alamat"
                                                            class="form-control @error('alamat') is-invalid @enderror" value=""
                                                            placeholder="Masukan Alamat">
                                                        @error('alamat')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kewarganegaraan">Kewarganegaraan</label>
                                                        <input type="text" name="kewarganegaraan"
                                                            class="form-control @error('kewarganegaraan') is-invalid @enderror" value=""
                                                            placeholder="Masukan Kewarganegaraan">
                                                        @error('kewarganegaraan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="no_tlp">No. Hp</label>
                                                        <input type="text" name="no_tlp"
                                                            class="form-control @error('no_tlp') is-invalid @enderror" value=""
                                                            placeholder="Masukan No. Hp">
                                                        @error('no_tlp')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="golongan_drh">Golongan Darah</label>
                                                        <input type="text" name="golongan_drh"
                                                            class="form-control @error('golongan_drh') is-invalid @enderror" value=""
                                                            placeholder="Masukan Golongan Darah">
                                                        @error('golongan_drh')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="riwayat_penyakit">Riwayat Penyakit</label>
                                                        <input type="text" name="riwayat_penyakit"
                                                            class="form-control @error('riwayat_penyakit') is-invalid @enderror" value=""
                                                            placeholder="Masukan Riwayat Penyakit">
                                                        @error('riwayat_penyakit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kelainan_jasmani">Kelainan Jasmani</label>
                                                        <input type="text" name="kelainan_jasmani"
                                                            class="form-control @error('kelainan_jasmani') is-invalid @enderror" value=""
                                                            placeholder="Masukan Kelainan Jasmani">
                                                        @error('kelainan_jasmani')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tinggi">Tinggi Badan</label>
                                                        <input type="text" name="tinggi"
                                                            class="form-control @error('tinggi') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tinggi Badan">
                                                        @error('tinggi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="berat_bdn">Berat Badan</label>
                                                        <input type="text" name="berat_bdn"
                                                            class="form-control @error('berat_bdn') is-invalid @enderror" value=""
                                                            placeholder="Masukan Berat Badan">
                                                        @error('berat_bdn')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="lulusan_dari">Lulusan Dari</label>
                                                        <input type="text" name="lulusan_dari"
                                                            class="form-control @error('lulusan_dari') is-invalid @enderror" value=""
                                                            placeholder="Masukan Lulusan Dari">
                                                        @error('lulusan_dari')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tanggal_lulusan">Tanggal Lulusan</label>
                                                        <input type="date" name="tanggal_lulusan"
                                                            class="form-control @error('tanggal_lulusan') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tanggal Lulusan">
                                                        @error('tanggal_lulusan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="anak_ke">Anak Ke</label>
                                                        <input type="text" name="anak_ke"
                                                            class="form-control @error('anak_ke') is-invalid @enderror" value=""
                                                            placeholder="Masukan Anak Ke">
                                                        @error('anak_ke')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="jml_saudara_kandung">Jumlah Saudara Kandung</label>
                                                        <input type="text" name="jml_saudara_kandung"
                                                            class="form-control @error('jml_saudara_kandung') is-invalid @enderror" value=""
                                                            placeholder="Masukan Jumlah Saudara Kandung">
                                                        @error('jml_saudara_kandung')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="jml_saudara_tiri">Jumlah Saudara Tiri</label>
                                                        <input type="text" name="jml_saudara_tiri"
                                                            class="form-control @error('jml_saudara_tiri') is-invalid @enderror" value=""
                                                            placeholder="Masukan Jumlah Saudara Tiri">
                                                        @error('jml_saudara_tiri')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="jml_saudara_angkat">Jumlah Saudara Angkat</label>
                                                        <input type="text" name="jml_saudara_angkat"
                                                            class="form-control @error('jml_saudara_angkat') is-invalid @enderror" value=""
                                                            placeholder="Masukan Jumlah Saudara Angkat">
                                                        @error('jml_saudara_angkat')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="status_anak">Status Anak dalam Keluarga</label>
                                                        <input type="text" name="status_anak"
                                                            class="form-control @error('status_anak') is-invalid @enderror" value=""
                                                            placeholder="Masukan Status Anak dalam Keluarga">
                                                        @error('status_anak')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nama_ayah_kandung">Nama Ayah Kandung</label>
                                                        <input type="text" name="nama_ayah_kandung"
                                                            class="form-control @error('nama_ayah_kandung') is-invalid @enderror" value=""
                                                            placeholder="Masukan Nama Ayah Kandung">
                                                        @error('nama_ayah_kandung')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tgl_lhr_ayah">Tanggal Lahir Ayah</label>
                                                        <input type="text" name="tgl_lhr_ayah"
                                                            class="form-control @error('tgl_lhr_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tanggal Lahir Ayah">
                                                        @error('tgl_lhr_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="agama_ayah">Agama Ayah</label>
                                                        <input type="text" name="agama_ayah"
                                                            class="form-control @error('agama_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Agama Ayah">
                                                        @error('agama_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kewarganegaraan_ayah">Kewarganegaraan Ayah</label>
                                                        <input type="text" name="kewarganegaraan_ayah"
                                                            class="form-control @error('kewarganegaraan_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Kewarganegaraan Ayah">
                                                        @error('kewarganegaraan_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pendidikan_ayah">Pendidikan Ayah</label>
                                                        <input type="text" name="pendidikan_ayah"
                                                            class="form-control @error('pendidikan_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pendidikan Ayah">
                                                        @error('pendidikan_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                        <input type="text" name="pekerjaan_ayah"
                                                            class="form-control @error('pekerjaan_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pekerjaan Ayah">
                                                        @error('pekerjaan_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="penghasilan_bln_ayah">Penghasilan Ayah per Bulan</label>
                                                        <input type="text" name="penghasilan_bln_ayah"
                                                            class="form-control @error('penghasilan_bln_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Penghasilan Ayah per Bulan">
                                                        @error('penghasilan_bln_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="alamat_ayah">Alamat Ayah</label>
                                                        <input type="text" name="alamat_ayah"
                                                            class="form-control @error('alamat_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan Alamat Ayah">
                                                        @error('alamat_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tlp_ayah">No. Hp Ayah</label>
                                                        <input type="text" name="tlp_ayah"
                                                            class="form-control @error('tlp_ayah') is-invalid @enderror" value=""
                                                            placeholder="Masukan No. Hp Ayah">
                                                        @error('tlp_ayah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                                        <input type="text" name="nama_ibu_kandung"
                                                            class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value=""
                                                            placeholder="Masukan Nama Ibu Kandung">
                                                        @error('nama_ibu_kandung')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tgl_lhr_ibu">Tanggal Lahir Ibu</label>
                                                        <input type="text" name="tgl_lhr_ibu"
                                                            class="form-control @error('tgl_lhr_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tanggal Lahir Ibu">
                                                        @error('tgl_lhr_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="agama_ibu">Agama Ibu</label>
                                                        <input type="text" name="agama_ibu"
                                                            class="form-control @error('agama_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Agama Ibu">
                                                        @error('agama_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kewarganegaraan_ibu">Kewarganegaraan Ibu</label>
                                                        <input type="text" name="kewarganegaraan_ibu"
                                                            class="form-control @error('kewarganegaraan_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Kewarganegaraan Ibu">
                                                        @error('kewarganegaraan_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pendidikan_ibu">Pendidikan Ibu</label>
                                                        <input type="text" name="pendidikan_ibu"
                                                            class="form-control @error('pendidikan_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pendidikan Ibu">
                                                        @error('pendidikan_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                        <input type="text" name="pekerjaan_ibu"
                                                            class="form-control @error('pekerjaan_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pekerjaan Ibu">
                                                        @error('pekerjaan_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="penghasilan_bln_ibu">Penghasilan Ibu per Bulan</label>
                                                        <input type="text" name="penghasilan_bln_ibu"
                                                            class="form-control @error('penghasilan_bln_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan Penghasilan Ibu per Bulan">
                                                        @error('penghasilan_bln_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tlp_ibu">No. Hp Ibu</label>
                                                        <input type="text" name="tlp_ibu"
                                                            class="form-control @error('tlp_ibu') is-invalid @enderror" value=""
                                                            placeholder="Masukan No. Hp Ibu">
                                                        @error('tlp_ibu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nama_wali">Nama Wali</label>
                                                        <input type="text" name="nama_wali"
                                                            class="form-control @error('nama_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Nama Wali">
                                                        @error('nama_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tgl_lhr_wali">Tanggal Lahir Wali</label>
                                                        <input type="text" name="tgl_lhr_wali"
                                                            class="form-control @error('tgl_lhr_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Tanggal Lahir Wali">
                                                        @error('tgl_lhr_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="agama_wali">Agama Wali</label>
                                                        <input type="text" name="agama_wali"
                                                            class="form-control @error('agama_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Agama Wali">
                                                        @error('agama_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kewarganegaraan_wali">Kewarganegaraan Wali</label>
                                                        <input type="text" name="kewarganegaraan_wali"
                                                            class="form-control @error('kewarganegaraan_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Kewarganegaraan Wali">
                                                        @error('kewarganegaraan_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pendidikan_wali">Pendidikan Wali</label>
                                                        <input type="text" name="pendidikan_wali"
                                                            class="form-control @error('pendidikan_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pendidikan Wali">
                                                        @error('pendidikan_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="pekerjaan_wali">Pekerjaan Wali</label>
                                                        <input type="text" name="pekerjaan_wali"
                                                            class="form-control @error('pekerjaan_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Pekerjaan Wali">
                                                        @error('pekerjaan_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="penghasilan_bln_wali">Penghasilan Wali per Bulan</label>
                                                        <input type="text" name="penghasilan_bln_wali"
                                                            class="form-control @error('penghasilan_bln_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Penghasilan Wali per Bulan">
                                                        @error('penghasilan_bln_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="alamat_wali">Alamat Wali</label>
                                                        <input type="text" name="alamat_wali"
                                                            class="form-control @error('alamat_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan Alamat Wali">
                                                        @error('alamat_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tlp_wali">No. Hp Wali</label>
                                                        <input type="text" name="tlp_wali"
                                                            class="form-control @error('tlp_wali') is-invalid @enderror" value=""
                                                            placeholder="Masukan No. Hp Wali">
                                                        @error('tlp_wali')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
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

    {{-- MODAL TAMBAH --}}
    <div class="modal fade tambahSiswa" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store-siswa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="nisn">NISN</label>
                                    <input type="text" name="nisn"
                                        class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" placeholder="Masukan NISN">
                                    @error('nisn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="nama_siswa">Nama Lengkap</label>
                                    <input type="text" name="nama_siswa"
                                        class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}"
                                        placeholder="Masukan Nama Lengkap">
                                    @error('nama_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pas_foto">Pas Foto</label>
                                    <input type="file" name="pas_foto" value="{{ old('pas_foto') }}"
                                        class="form-control-file @error('pas_foto') is-invalid @enderror">
                                    @error('pas_foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control input-sm @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kelas_id">Kelas</label>
                                    <select class="form-control input-sm" name="kelas_id" value="{{ old('kelas_id') }}">
                                        <option value="">-- Pilih Jenis Kelas --</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="status_siswa">Status Siswa</label>
                                    <input type="text" name="status_siswa" value="{{ old('status_siswa') }}"
                                        class="form-control @error('status_siswa') is-invalid @enderror" value=""
                                        placeholder="Masukan Status Siswa">
                                    @error('status_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" value=""
                                        placeholder="Masukan Tempat Lahir">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        placeholder="Masukan Tanggal Lahir">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="agama">Agama</label>
                                    <input type="text" name="agama" value="{{ old('agama') }}"
                                        class="form-control @error('agama') is-invalid @enderror"
                                        placeholder="Masukan Agama">
                                    @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ old('alamat') }}"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukan Alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}"
                                        class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                        placeholder="Masukan Kewarganegaraan">
                                    @error('kewarganegaraan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="no_tlp">No. Hp</label>
                                    <input type="text" name="no_tlp" value="{{ old('no_tlp') }}"
                                        class="form-control @error('no_tlp') is-invalid @enderror" 
                                        placeholder="Masukan No. Hp">
                                    @error('no_tlp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="golongan_drh">Golongan Darah</label>
                                    <input type="text" name="golongan_drh" value="{{ old('golongan_drh') }}"
                                        class="form-control @error('golongan_drh') is-invalid @enderror"
                                        placeholder="Masukan Golongan Darah">
                                    @error('golongan_drh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="riwayat_penyakit">Riwayat Penyakit</label>
                                    <input type="text" name="riwayat_penyakit"
                                        class="form-control @error('riwayat_penyakit') is-invalid @enderror" value="{{ old('riwayat_penyakit') }}"
                                        placeholder="Masukan Riwayat Penyakit">
                                    @error('riwayat_penyakit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kelainan_jasmani">Kelainan Jasmani</label>
                                    <input type="text" name="kelainan_jasmani"
                                        class="form-control @error('kelainan_jasmani') is-invalid @enderror" value="{{ old('kelainan_jasmani') }}"
                                        placeholder="Masukan Kelainan Jasmani">
                                    @error('kelainan_jasmani')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tinggi">Tinggi Badan</label>
                                    <input type="text" name="tinggi"
                                        class="form-control @error('tinggi') is-invalid @enderror" value="{{ old('tinggi') }}"
                                        placeholder="Masukan Tinggi Badan">
                                    @error('tinggi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="berat_bdn">Berat Badan</label>
                                    <input type="text" name="berat_bdn"
                                        class="form-control @error('berat_bdn') is-invalid @enderror" value="{{ old('berat_bdn') }}"
                                        placeholder="Masukan Berat Badan">
                                    @error('berat_bdn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="lulusan_dari">Lulusan Dari</label>
                                    <input type="text" name="lulusan_dari"
                                        class="form-control @error('lulusan_dari') is-invalid @enderror" value="{{ old('lulusan_dari') }}"
                                        placeholder="Masukan Lulusan Dari">
                                    @error('lulusan_dari')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tanggal_lulusan">Tanggal Lulusan</label>
                                    <input type="date" name="tanggal_lulusan"
                                        class="form-control @error('tanggal_lulusan') is-invalid @enderror" value="{{ old('tanggal_lulusan') }}"
                                        placeholder="Masukan Tanggal Lulusan">
                                    @error('tanggal_lulusan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="anak_ke">Anak Ke</label>
                                    <input type="text" name="anak_ke"
                                        class="form-control @error('anak_ke') is-invalid @enderror" value="{{ old('anak_ke') }}"
                                        placeholder="Masukan Anak Ke">
                                    @error('anak_ke')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="jml_saudara_kandung">Jumlah Saudara Kandung</label>
                                    <input type="text" name="jml_saudara_kandung"
                                        class="form-control @error('jml_saudara_kandung') is-invalid @enderror" value="{{ old('jml_saudara_kandung') }}"
                                        placeholder="Masukan Jumlah Saudara Kandung">
                                    @error('jml_saudara_kandung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="jml_saudara_tiri">Jumlah Saudara Tiri</label>
                                    <input type="text" name="jml_saudara_tiri"
                                        class="form-control @error('jml_saudara_tiri') is-invalid @enderror" value="{{ old('jml_saudara_tiri') }}"
                                        placeholder="Masukan Jumlah Saudara Tiri">
                                    @error('jml_saudara_tiri')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="jml_saudara_angkat">Jumlah Saudara Angkat</label>
                                    <input type="text" name="jml_saudara_angkat"
                                        class="form-control @error('jml_saudara_angkat') is-invalid @enderror" value="{{ old('jml_saudara_angkat') }}"
                                        placeholder="Masukan Jumlah Saudara Angkat">
                                    @error('jml_saudara_angkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="status_anak">Status Anak dalam Keluarga</label>
                                    <input type="text" name="status_anak"
                                        class="form-control @error('status_anak') is-invalid @enderror" value="{{ old('status_anak') }}"
                                        placeholder="Masukan Status Anak dalam Keluarga">
                                    @error('status_anak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="nama_ayah_kandung">Nama Ayah Kandung</label>
                                    <input type="text" name="nama_ayah_kandung"
                                        class="form-control @error('nama_ayah_kandung') is-invalid @enderror" value="{{ old('nama_ayah_kandung') }}"
                                        placeholder="Masukan Nama Ayah Kandung">
                                    @error('nama_ayah_kandung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tgl_lhr_ayah">Tanggal Lahir Ayah</label>
                                    <input type="date" name="tgl_lhr_ayah"
                                        class="form-control @error('tgl_lhr_ayah') is-invalid @enderror" value="{{ old('tgl_lhr_ayah') }}"
                                        placeholder="Masukan Tanggal Lahir Ayah">
                                    @error('tgl_lhr_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="agama_ayah">Agama Ayah</label>
                                    <input type="text" name="agama_ayah"
                                        class="form-control @error('agama_ayah') is-invalid @enderror" value="{{ old('agama_ayah') }}"
                                        placeholder="Masukan Agama Ayah">
                                    @error('agama_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kewarganegaraan_ayah">Kewarganegaraan Ayah</label>
                                    <input type="text" name="kewarganegaraan_ayah"
                                        class="form-control @error('kewarganegaraan_ayah') is-invalid @enderror" value="{{ old('kewarganegaraan_ayah') }}"
                                        placeholder="Masukan Kewarganegaraan Ayah">
                                    @error('kewarganegaraan_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pendidikan_ayah">Pendidikan Ayah</label>
                                    <input type="text" name="pendidikan_ayah"
                                        class="form-control @error('pendidikan_ayah') is-invalid @enderror" value="{{ old('pendidikan_ayah') }}"
                                        placeholder="Masukan Pendidikan Ayah">
                                    @error('pendidikan_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input type="text" name="pekerjaan_ayah"
                                        class="form-control @error('pekerjaan_ayah') is-invalid @enderror" value="{{ old('pekerjaan_ayah') }}"
                                        placeholder="Masukan Pekerjaan Ayah">
                                    @error('pekerjaan_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="penghasilan_bln_ayah">Penghasilan Ayah per Bulan</label>
                                    <input type="text" name="penghasilan_bln_ayah"
                                        class="form-control @error('penghasilan_bln_ayah') is-invalid @enderror" value="{{ old('penghasilan_bln_ayah') }}"
                                        placeholder="Masukan Penghasilan Ayah per Bulan">
                                    @error('penghasilan_bln_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="alamat_ayah">Alamat Ayah</label>
                                    <input type="text" name="alamat_ayah"
                                        class="form-control @error('alamat_ayah') is-invalid @enderror" value="{{ old('alamat_ayah') }}"
                                        placeholder="Masukan Alamat Ayah">
                                    @error('alamat_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tlp_ayah">No. Hp Ayah</label>
                                    <input type="text" name="tlp_ayah"
                                        class="form-control @error('tlp_ayah') is-invalid @enderror" value="{{ old('tlp_ayah') }}"
                                        placeholder="Masukan No. Hp Ayah">
                                    @error('tlp_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                    <input type="text" name="nama_ibu_kandung"
                                        class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value="{{ old('nama_ibu_kandung') }}"
                                        placeholder="Masukan Nama Ibu Kandung">
                                    @error('nama_ibu_kandung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tgl_lhr_ibu">Tanggal Lahir Ibu</label>
                                    <input type="date" name="tgl_lhr_ibu"
                                        class="form-control @error('tgl_lhr_ibu') is-invalid @enderror" value="{{ old('tgl_lhr_ibu') }}"
                                        placeholder="Masukan Tanggal Lahir Ibu">
                                    @error('tgl_lhr_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="agama_ibu">Agama Ibu</label>
                                    <input type="text" name="agama_ibu"
                                        class="form-control @error('agama_ibu') is-invalid @enderror" value="{{ old('agama_ibu') }}"
                                        placeholder="Masukan Agama Ibu">
                                    @error('agama_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kewarganegaraan_ibu">Kewarganegaraan Ibu</label>
                                    <input type="text" name="kewarganegaraan_ibu"
                                        class="form-control @error('kewarganegaraan_ibu') is-invalid @enderror" value="{{ old('kewarganegaraan_ibu') }}"
                                        placeholder="Masukan Kewarganegaraan Ibu">
                                    @error('kewarganegaraan_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pendidikan_ibu">Pendidikan Ibu</label>
                                    <input type="text" name="pendidikan_ibu"
                                        class="form-control @error('pendidikan_ibu') is-invalid @enderror" value="{{ old('pendidikan_ibu') }}"
                                        placeholder="Masukan Pendidikan Ibu">
                                    @error('pendidikan_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input type="text" name="pekerjaan_ibu"
                                        class="form-control @error('pekerjaan_ibu') is-invalid @enderror" value="{{ old('pekerjaan_ibu') }}"
                                        placeholder="Masukan Pekerjaan Ibu">
                                    @error('pekerjaan_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="penghasilan_bln_ibu">Penghasilan Ibu per Bulan</label>
                                    <input type="text" name="penghasilan_bln_ibu"
                                        class="form-control @error('penghasilan_bln_ibu') is-invalid @enderror" value="{{ old('penghasilan_bln_ibu') }}"
                                        placeholder="Masukan Penghasilan Ibu per Bulan">
                                    @error('penghasilan_bln_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tlp_ibu">No. Hp Ibu</label>
                                    <input type="text" name="tlp_ibu"
                                        class="form-control @error('tlp_ibu') is-invalid @enderror" value="{{ old('tlp_ibu') }}"
                                        placeholder="Masukan No. Hp Ibu">
                                    @error('tlp_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="nama_wali">Nama Wali</label>
                                    <input type="text" name="nama_wali"
                                        class="form-control @error('nama_wali') is-invalid @enderror" value="{{ old('nama_wali') }}"
                                        placeholder="Masukan Nama Wali">
                                    @error('nama_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tgl_lhr_wali">Tanggal Lahir Wali</label>
                                    <input type="date" name="tgl_lhr_wali"
                                        class="form-control @error('tgl_lhr_wali') is-invalid @enderror" value="{{ old('tgl_lhr_wali') }}"
                                        placeholder="Masukan Tanggal Lahir Wali">
                                    @error('tgl_lhr_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="agama_wali">Agama Wali</label>
                                    <input type="text" name="agama_wali"
                                        class="form-control @error('agama_wali') is-invalid @enderror" value="{{ old('agama_wali') }}"
                                        placeholder="Masukan Agama Wali">
                                    @error('agama_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="kewarganegaraan_wali">Kewarganegaraan Wali</label>
                                    <input type="text" name="kewarganegaraan_wali"
                                        class="form-control @error('kewarganegaraan_wali') is-invalid @enderror" value="{{ old('kewarganegaraan_wali') }}"
                                        placeholder="Masukan Kewarganegaraan Wali">
                                    @error('kewarganegaraan_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pendidikan_wali">Pendidikan Wali</label>
                                    <input type="text" name="pendidikan_wali"
                                        class="form-control @error('pendidikan_wali') is-invalid @enderror" value="{{ old('pendidikan_wali') }}"
                                        placeholder="Masukan Pendidikan Wali">
                                    @error('pendidikan_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="pekerjaan_wali">Pekerjaan Wali</label>
                                    <input type="text" name="pekerjaan_wali"
                                        class="form-control @error('pekerjaan_wali') is-invalid @enderror" value="{{ old('pekerjaan_wali') }}"
                                        placeholder="Masukan Pekerjaan Wali">
                                    @error('pekerjaan_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="penghasilan_bln_wali">Penghasilan Wali per Bulan</label>
                                    <input type="text" name="penghasilan_bln_wali"
                                        class="form-control @error('penghasilan_bln_wali') is-invalid @enderror" value="{{ old('penghasilan_bln_wali') }}"
                                        placeholder="Masukan Penghasilan Wali per Bulan">
                                    @error('penghasilan_bln_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="alamat_wali">Alamat Wali</label>
                                    <input type="text" name="alamat_wali"
                                        class="form-control @error('alamat_wali') is-invalid @enderror" value="{{ old('alamat_wali') }}"
                                        placeholder="Masukan Alamat Wali">
                                    @error('alamat_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="tlp_wali">No. Hp Wali</label>
                                    <input type="text" name="tlp_wali"
                                        class="form-control @error('tlp_wali') is-invalid @enderror" value="{{ old('tlp_wali') }}"
                                        placeholder="Masukan No. Hp Wali">
                                    @error('tlp_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
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
