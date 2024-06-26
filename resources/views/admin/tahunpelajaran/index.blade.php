@extends('layouts.app')
@section('tittle', 'Tabel Tahun Pelajaran')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="col-md-12 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahTahunPelajaran" class="btn btn-info" title="Tambah Tahun Pelajaran">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">TAHUN PELAJARAN</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahunpelajaran as $t)
                        <tr class="text-center">
                            <td>{{ $t->tahun_pelajaran }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#editTahunpelajaran{{ $t->id }}" title="Edit role"><i class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $t->id }}" action="{{ route('admin.delete-tahunpelajaran', ['id' => $t->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editTahunpelajaran{{ $t->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Jurusan</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-tahunpelajaran', ['id' => $t->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="tahun_pelajaran" >Tahun Pelajaran</label>
                                            <input type="text" name="tahun_pelajaran" value="{{ $t->tahun_pelajaran }}" class="form-control @error('tahun_pelajaran') is-invalid @enderror" value="2024" placeholder="Masukan tahun pelajaran">
                                            @error('tahun_pelajaran')
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
                                $('#deleteForm{{ $t->id }}').submit(function(e){
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

<div class="modal fade tambahTahunPelajaran" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Tahun Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.store-tahunpelajaran') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="tahun_pelajaran" >Tahun Pelajaran</label>
                <input type="text" name="tahun_pelajaran" class="form-control @error('tahun_pelajaran') is-invalid @enderror" placeholder="Masukan tahun pelajaran">
                @error('tahun_pelajaran')
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