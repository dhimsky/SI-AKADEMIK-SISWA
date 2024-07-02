@extends('layouts.app')
@section('tittle', 'Tabel Guru')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="col-md-12 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahguru" class="btn btn-info"
                        title="Tambah Guru">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">NIP</th>
                            <th class="text-center">NAMA LENGKAP</th>
                            <th class="text-center">MATA PELAJARAN</th>
                            <th class="text-center">SEBAGAI WALI KELAS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $item)
                            <tr class="text-center">
                                <td>{{ $item->nip }}</td>
                                <td class="text-left">{{ $item->nama_guru }}</td>
                                <td class="text-left">{{ $item->mapel->nama_mapel }}</td>
                                <td>{{ $item->kelas_id ?? '-' }}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                        data-target="#editguru{{ $item->nip }}" title="Edit Wali Kelas"><i
                                            class="fa fa-pencil font-14"></i></button>
                                    <form id="deleteForm{{ $item->nip }}" action="{{ route('admin.delete-guru', ['id' => $item->nip]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editguru{{ $item->nip }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Guru</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-guru', ['id' => $item->nip]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nip">NIP</label>
                                                <input type="text" name="nip"
                                                    class="form-control @error('nip') is-invalid @enderror" disabled value="{{ $item->nip }}" placeholder="Masukan NIP">
                                                @error('nip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nama_guru">Nama Lengkap</label>
                                                <input type="text" name="nama_guru"
                                                    class="form-control @error('nama_guru') is-invalid @enderror" value="{{ $item->nama_guru }}"
                                                    placeholder="Masukan Nama Lengkap">
                                                @error('nama_guru')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="mapel_kode">Mata Pelajaran</label>
                                                <select class="form-control input-sm" name="mapel_kode">
                                                    @foreach ($mapel as $m)
                                                        <option @if ($m->kode_mapel == $item->mapel_kode) selected @endif value="{{ $m->kode_mapel }}">{{ $m->nama_mapel }}</option>
                                                    @endforeach
                                                </select>
                                                @error('mapel_kode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="kelas_id">Sebagai Wali Kelas</label>
                                                <select class="form-control input-sm" name="kelas_id">
                                                    <option value="">Tidak Sebagai Wali Kelas</option>
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
                                            {{-- <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="email">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $item->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="password">Password</label>
                                                <input type="password" name="password" 
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Masukan password baru">
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

    <div class="modal fade tambahguru" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store-guru') }}" method="POST">
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
                            <label class="required-label faded-label" for="nama_guru">Nama Lengkap</label>
                            <input type="text" name="nama_guru"
                                class="form-control @error('nama_guru') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                            @error('nama_guru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="mapel_kode">Mata Pelajaran</label>
                            <select class="form-control input-sm" name="mapel_kode">
                                @foreach ($mapel as $item)
                                    <option value="{{ $item->kode_mapel }}">{{ $item->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @error('mapel_kode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="kelas_id">Sebagai Wali Kelas</label>
                            <select class="form-control input-sm" name="kelas_id">
                                <option value="">Tidak Sebagai Wali Kelas</option>
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
