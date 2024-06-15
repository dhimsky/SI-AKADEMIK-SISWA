@extends('layouts.app')
@section('tittle', 'Tabel Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Siswa</div>
                <div class="col-md-9 mt-4 text-right">
                    <form action="" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-3 mb-2">
                                <select id="kelas_id" name="kelas_id" class="form-control">
                                    <option selected value="">Semua Kelas</option>
                                    @foreach ($kelas as $k)
                                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <select id="angkatan_id" name="angkatan_id" class="form-control">
                                    <option selected value="">Semua Angkatan</option>
                                    @foreach ($angkatans as $a)
                                    <option value="{{ $a->kode_angkatan }}">{{ $a->tahun_angkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 text-right ">
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
                            <th>NISN</th>
                            <th>NAMA LENGKAP</th>
                            <th>KELAS</th>
                            <th>JURUSAN</th>
                            <th>SEMESTER</th>
                            <th>ANGKATAN</th>
                            <th>TAHUN PELAJARAN</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @foreach ($siswas as $s)
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->kelas_id }}</td>
                            <td>{{ $s->kelas->jurusan->nama_jurusan }}</td>
                            <td>{{ $s->semester }}</td>
                            <td>{{ $s->angkatan->tahun_angkatan}}</td>
                            <td>{{ $s->tahunpelajaran_id->tahun_pelajaran }}</td>
                            <td>{{ $s->status_siswa}}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                    data-target=".editSiswa" title="Edit Siswa"><i
                                        class="fa fa-pencil font-14"></i></button>
                                <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                            </td>
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
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nisn">NISN</label>
                                                        <input type="text" name="nisn"
                                                            class="form-control @error('nisn') is-invalid @enderror" placeholder="Masukan NISN" value="{{ $s->nisn }}">
                                                        @error('nisn')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nama_siswa">Nama Lengkap</label>
                                                        <input type="text" name="nama_siswa"
                                                            class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ $s->nama_siswa }}"
                                                            placeholder="Masukan Nama Lengkap">
                                                        @error('nama_siswa')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="kelas_id">Kelas</label>
                                                        <select class="form-control input-sm @error('kelas_id') is-invalid @enderror" name="kelas_id">
                                                            @foreach ($kelas as $k)
                                                            <option value="{{ $k->nama_kelas }}" {{ $k->nama_kelas === $s->kelas_id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('kelas_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="angkatan_id">Angkatan</label>
                                                        <select class="form-control input-sm @error('angkatan_id') is-invalid @enderror" name="angkatan_id">
                                                            @foreach ($angkatans as $a)
                                                            <option value="{{ $a->kode_angkatan }}" {{ $a->kode_angkatan === $s->angkatan_id ? 'selected' : '' }}>{{ $a->tahun_angkatan }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('angkatan_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="tahunpelajaran_id">Angkatan</label>
                                                        <select class="form-control input-sm @error('tahunpelajaran_id') is-invalid @enderror" name="tahunpelajaran_id">
                                                            @foreach ($tahunpelajaran as $a)
                                                            <option value="{{ $a->id }}" {{ $a->id === $s->tahunpelajaran_id ? 'selected' : '' }}>{{ $a->tahun_pelajaran }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('tahunpelajaran_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="status_siswa">Status Siswa</label>
                                                        <select class="form-control @error('status_siswa') is-invalid @enderror" id="status_siswa" name="status_siswa">
                                                            <option value="Aktif" {{ $s->status_siswa === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                            <option value="Lulus" {{ $s->status_siswa === 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                                        </select>
                                                        @error('status_siswa')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="semester">Semester</label>
                                                        <select class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester">
                                                            <option value="1" {{ $s->semester === '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ $s->semester === '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ $s->semester === '3' ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ $s->semester === '4' ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ $s->semester === '5' ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ $s->semester === '6' ? 'selected' : '' }}>6</option>
                                                        </select>
                                                        @error('semester')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
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
                        @endforeach
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="angkatan_id">Angkatan</label>
                                    <select class="form-control input-sm" name="angkatan_id" value="{{ old('angkatan_id') }}">
                                        <option value="">-- Pilih Angkatan --</option>
                                        @foreach ($angkatans as $a)
                                            <option value="{{ $a->kode_angkatan }}">{{ $a->tahun_angkatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('angkatan_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="status_siswa">Status Siswa</label>
                                    <select class="form-control input-sm" name="status_siswa" value="{{ old('status_siswa') }}">
                                        <option selected disabled value="" style="font-style: italic;">-- Pilih Status --</option>
                                        <option value="Aktif" @if(old('status_siswa') == 'Aktif') selected @endif>Aktif</option>
                                        <option value="Tidak Aktif" @if(old('status_siswa') == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                                    </select>
                                    @error('status_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="required-label faded-label" for="semester">Semester</label>
                                    <select class="form-control input-sm" name="semester" value="{{ old('semester') }}">
                                        <option selected disabled value="" style="font-style: italic;">-- Pilih Semester --</option>
                                        <option value="1" @if(old('semester') == '1') selected @endif>1</option>
                                        <option value="2" @if(old('semester') == '2') selected @endif>2</option>
                                        <option value="3" @if(old('semester') == '3') selected @endif>3</option>
                                        <option value="4" @if(old('semester') == '4') selected @endif>4</option>
                                        <option value="5" @if(old('semester') == '5') selected @endif>5</option>
                                        <option value="6" @if(old('semester') == '6') selected @endif>6</option>
                                    </select>
                                    @error('semester')
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
