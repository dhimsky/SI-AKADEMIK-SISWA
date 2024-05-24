@extends('layouts.app')
@section('tittle', 'Rombel')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Rombel</div>
            <div class="col-md-2 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahRombel" class="btn btn-info" title="Tambah Rombel">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>KODE ROMBEL</th>
                        <th>NAMA ROMBEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rombel as $item)
                        <tr class="text-center">
                            <td>{{ $item->kode_rombel }}</td>
                            <td>{{ $item->nama_rombel }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#editRombel{{ $item->kode_rombel }}" title="Edit rombel"><i class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $item->kode_rombel }}" action="{{ route('admin.delete-rombel', ['kode_rombel' => $item->kode_rombel]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editRombel{{ $item->kode_rombel }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Rombel</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                <form action="{{ route('admin.update-rombel', ['kode_rombel' => $item->kode_rombel]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="kode_rombel" >Kode Rombel</label>
                                                <input type="text" name="kode_rombel" class="form-control @error('kode_rombel') is-invalid @enderror" value="{{ $item->kode_rombel }}">
                                                @error('kode_rombel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label faded-label" for="nama_rombel" >Nama Rombel</label>
                                                <input type="text" name="nama_rombel" class="form-control @error('nama_rombel') is-invalid @enderror" value="{{ $item->nama_rombel }}" placeholder="Masukan nama role">
                                                @error('nama_rombel')
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
                                $('#deleteForm{{ $item->kode_rombel }}').submit(function(e){
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

<div class="modal fade tambahRombel" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Rombel</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <form action="{{ route('admin.store-rombel') }}" method="POST">
            <div class="modal-body">
                @csrf
                    <div class="form-group mb-3">
                        <label class="required-label faded-label" for="kode_rombel" >Kode Rombel</label>
                        <input type="text" name="kode_rombel" class="form-control @error('kode_rombel') is-invalid @enderror" placeholder="Masukan Kode">
                        @error('kode_rombel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="required-label faded-label" for="nama_rombel" >Nama Rombel</label>
                        <input type="text" name="nama_rombel" class="form-control @error('nama_rombel') is-invalid @enderror" placeholder="Masukan nama rombel">
                        @error('nama_rombel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
    @include('validasi.validasi-edit')
    @include('validasi.notifikasi-berhasil')
@endsection