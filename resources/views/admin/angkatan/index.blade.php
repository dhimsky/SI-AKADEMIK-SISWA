@extends('layouts.app')
@section('tittle', 'Tabel Angkatan')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="col-md-12 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahAngkatan" class="btn btn-info" title="Tambah Angkatan">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">KODE ANGKATAN</th>
                        <th class="text-center">TAHUN ANGKATAN</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($angkatan as $item)
                        <tr class="text-center">
                            <td>{{ $item->kode_angkatan }}</td>
                            <td>{{ $item->tahun_angkatan }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#editAngkatan{{ $item->kode_angkatan }}" title="Edit role"><i class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $item->kode_angkatan }}" action="{{ route('admin.delete-angkatan', ['kode_angkatan' => $item->kode_angkatan]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editAngkatan{{ $item->kode_angkatan }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Jurusan</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-angkatan', ['kode_angkatan' => $item->kode_angkatan]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="kode_angkatan" >Kode Angkatan</label>
                                            <input readonly type="number" name="kode_angkatan" value="{{ $item->kode_angkatan }}" class="form-control @error('kode_angkatan') is-invalid @enderror" value="24">
                                            @error('kode_angkatan')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="tahun_angkatan" >Tahun Angkatan</label>
                                            <input type="number" name="tahun_angkatan" value="{{ $item->tahun_angkatan }}" class="form-control @error('tahun_angkatan') is-invalid @enderror" value="2024" placeholder="Masukan tahun angkatan">
                                            @error('tahun_angkatan')
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
                                $('#deleteForm{{ $item->kode_angkatan }}').submit(function(e){
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

<div class="modal fade tambahAngkatan" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Angkatan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.store-angkatan') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="kode_angkatan" >Kode Angkatan</label>
                <input type="number" name="kode_angkatan" class="form-control @error('kode_angkatan') is-invalid @enderror" placeholder="Masukan Kode">
                @error('kode_angkatan')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="tahun_angkatan" >Tahun Angkatan</label>
                <input type="number" name="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" placeholder="Masukan tahun angkatan">
                @error('tahun_angkatan')
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