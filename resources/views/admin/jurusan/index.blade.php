@extends('layouts.app')
@section('tittle', 'Tabel Jurusan')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="col-md-12 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahJurusan" class="btn btn-info"
                        title="Tambah Jurusan">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">KODE JURUSAN</th>
                            <th class="text-center">NAMA JURUSAN</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->kode_jurusan }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                        data-target="#editJurusan{{ $item->kode_jurusan }}" title="Edit role"><i
                                            class="fa fa-pencil font-14"></i></button>
                                    <form id="deleteForm{{ $item->kode_jurusan }}" action="{{ route('admin.delete-jurusan', ['kode_jurusan' => $item->kode_jurusan]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editJurusan{{ $item->kode_jurusan }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Jurusan</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update-jurusan', ['kode_jurusan' => $item->kode_jurusan]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="kode_jurusan">Kode Jurusan</label>
                                                    <input type="text" name="kode_jurusan"
                                                        class="form-control @error('kode_jurusan') is-invalid @enderror" value="{{ $item->kode_jurusan }}">
                                                    @error('kode_jurusan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="nama_jurusan">Nama Jurusan</label>
                                                    <input type="text" name="nama_jurusan"
                                                        class="form-control @error('nama_jurusan') is-invalid @enderror" value="{{ $item->nama_jurusan }}"
                                                        placeholder="Masukan nama jurusan">
                                                    @error('nama_jurusan')
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
                                    $('#deleteForm{{ $item->kode_jurusan }}').submit(function(e){
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

    <div class="modal fade tambahJurusan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store-jurusan') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="kode_jurusan">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan"
                                class="form-control @error('kode_jurusan') is-invalid @enderror" placeholder="Masukan Kode">
                            @error('kode_jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan"
                                class="form-control @error('nama_jurusan') is-invalid @enderror"
                                placeholder="Masukan nama jurusan">
                            @error('nama_jurusan')
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
