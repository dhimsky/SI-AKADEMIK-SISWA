@extends('layouts.app')
@section('tittle', 'Tabel Akun')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="col-md-12 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahAkun" class="btn btn-info" title="Tambah Akun">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Kode Identitas</th>
                            <th class="text-center">NAMA LENGKAP</th>
                            <th class="text-center">ROLE</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akun as $item)
                            <tr class="text-center">
                                <td>{{ $item->kode_identitas }}</td>
                                <td class="text-left">{{ $item->nama_lengkap }}</td>
                                <td class="text-left">{{ $item->Role->level }}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#editAkun{{ $item->kode_identitas }}" title="Edit rombel"><i class="fa fa-pencil font-14"></i></button>
                                    <form id="deleteForm{{ $item->kode_identitas }}" action="{{ route('admin.delete-akun', ['id' => $item->kode_identitas]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editAkun{{ $item->kode_identitas }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Akun</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update-akun', ['id' => $item->kode_identitas]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="kode_identitas">Kode Identitas</label>
                                                    <input type="kode_identitas" name="kode_identitas" value="{{ $item->kode_identitas }}" class="form-control @error('kode_identitas') is-invalid @enderror"
                                                        placeholder="Masukan kode_identitas">
                                                    @error('kode_identitas')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap"
                                                        class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ $item->nama_lengkap }}" placeholder="Masukan nama role">
                                                    @error('nama_lengkap')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="role_id">Pilih Role</label>
                                                    <select class="form-control input-sm" name="role_id">
                                                        <option value="1" {{ $item->role_id === 1 ? 'selected' : '' }}>Admin</option>
                                                        <option value="4" {{ $item->role_id === 4 ? 'selected' : '' }}>Kepala Sekolah</option>
                                                        <option value="3" {{ $item->role_id === 3 ? 'selected' : '' }}>Siswa</option>
                                                    </select>
                                                    @error('role_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="password">Password</label>
                                                    <input type="hidden" name="password" value="{{ $item->password }}">
                                                    <input type="password" name="password_display" class="form-control @error('password') is-invalid @enderror" value="" placeholder="Masukkan password baru">
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

                            {{-- VALIDASI DELETE --}}
                            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                $(document).ready(function(){
                                    $('#deleteForm{{ $item->kode_identitas }}').submit(function(e){
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

    <div class="modal fade tambahAkun" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store-akun') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="required-label faded-label" for="kode_identitas">Kode Identitas</label>
                        <input type="kode_identitas" name="kode_identitas" class="form-control @error('kode_identitas') is-invalid @enderror"
                            placeholder="Masukan Kode Identitas">
                        @error('kode_identitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="required-label faded-label" for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                            placeholder="Masukan nama role">
                        @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="required-label faded-label" for="role_id">Pilih Role</label>
                        <select class="form-control input-sm" name="role_id">
                            <option value="1">Admin</option>
                            <option value="4">Kepala Sekolah</option>
                        </select>
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

    @include('validasi.validasi-edit')
    @include('validasi.notifikasi-berhasil')
@endsection
