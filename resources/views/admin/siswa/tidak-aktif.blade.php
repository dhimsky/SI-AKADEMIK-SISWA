@extends('layouts.app')
@section('tittle', 'Tabel Siswa Tidak Aktif')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">NAMA LENGKAP</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">JURUSAN</th>
                            <th class="text-center">SEMESTER</th>
                            <th class="text-center">ANGKATAN</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nonsiswas as $s)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td class="text-left">{{ $s->nama_siswa }}</td>
                            <td>{{ $s->kelas_id }}</td>
                            <td class="text-left">{{ $s->kelas->jurusan->nama_jurusan }}</td>
                            <td>{{ $s->semester }}</td>
                            <td>{{ $s->angkatan->tahun_angkatan}}</td>
                            <td>
                                @if ($s->status_siswa == 'Aktif')
                                <span class="badge badge-success">{{ $s->status_siswa }}</span>
                                @else
                                <span class="badge badge-danger">{{ $s->status_siswa }}</span>
                                @endif
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                    data-target=".editSiswa{{ $s->nis }}" title="Edit Siswa"><i
                                        class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $s->nis }}" action="{{ route('admin.delete-siswa', ['id' => $s->nis]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade editSiswa{{ $s->nis }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-siswa', ['id' => $s->nis]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nisn">NIS</label>
                                                        <input type="number" disabled name="nis"
                                                            class="form-control @error('nis') is-invalid @enderror" placeholder="Masukan NIS" value="{{ $s->nis }}">
                                                        @error('nis')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="nisn">NISN</label>
                                                        <input type="number" disabled name="nisn"
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
                                                            <option value="Tidak Aktif" {{ $s->status_siswa === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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

                        {{-- VALIDASI DELETE --}}
                        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).ready(function(){
                                $('#deleteForm{{ $s->nis }}').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: "Anda tidak akan dapat mengembalikan ini!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus saja!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Submit form manually
                                            this.submit();
                                        }
                                    });
                                });
                            });
                        </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
