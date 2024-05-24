@extends('layouts.app')
@section('tittle', 'Tabel Wali Kelas')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Wali Kelas</div>
                <div class="col-md-2 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahWalikelas" class="btn btn-info"
                        title="Tambah Wali Kelas">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>JENIS KELAMIN</th>
                            <th>SEBAGAI WALI KELAS</th>
                            <th>Email</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($walikelas as $item)
                            <tr class="text-center">
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama_walikelas }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->kelas_id }}</td>
                                <td>{{ $item->email }}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                        data-target="#editWalikelas{{ $item->nip }}" title="Edit Wali Kelas"><i
                                            class="fa fa-pencil font-14"></i></button>
                                    <form id="deleteForm{{ $item->nip }}" action="{{ route('admin.delete-walikelas', ['id' => $item->nip]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editWalikelas{{ $item->nip }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Wali Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-walikelas', ['id' => $item->nip]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nip">NIP</label>
                                                <input type="text" name="nip"
                                                    class="form-control @error('nip') is-invalid @enderror" value="{{ $item->nip }}" placeholder="Masukan NIP">
                                                @error('nip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nama_walikelas">Nama Lengkap</label>
                                                <input type="text" name="nama_walikelas"
                                                    class="form-control @error('nama_walikelas') is-invalid @enderror" value="{{ $item->nama_walikelas }}"
                                                    placeholder="Masukan Nama Lengkap">
                                                @error('nama_walikelas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control input-sm" name="jenis_kelamin">
                                                    <option @if ($item->jenis_kelamin == 'Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                                                    <option @if ($item->jenis_kelamin == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="kelas_id">Sebagai Wali Kelas</label>
                                                <select class="form-control input-sm" name="kelas_id">
                                                    @foreach ($kelas as $k)
                                                        <option @if ($k->nama_kelas == $item->kelas_id) selected @endif value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                                    @endforeach
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
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $item->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="password">Password</label>
                                                <input type="hidden" name="password" value="{{ $item->password }}">
                                                <input type="password" name="password_display" 
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

                        {{-- VALIDASI DELETE --}}
                        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).ready(function(){
                                $('#deleteForm{{ $item->nip }}').submit(function(e){
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

    <div class="modal fade tambahWalikelas" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Wali Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store-walikelas') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nip">NIP</label>
                            <input type="text" name="nip"
                                class="form-control @error('nip') is-invalid @enderror" placeholder="Masukan NIP">
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nama_walikelas">Nama Lengkap</label>
                            <input type="text" name="nama_walikelas"
                                class="form-control @error('nama_walikelas') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                            @error('nama_walikelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control input-sm" name="jenis_kelamin">
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
                            <select class="form-control input-sm" name="kelas_id">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                                @endforeach
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
