@extends('layouts.app')
@section('tittle', 'Kelas')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="col-md-12 text-right ">
                <a href="" data-toggle="modal" data-target=".tambahKelas" class="btn btn-info" title="Tambah Kelas">
                <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">NAMA KELAS</th>
                        <th class="text-center">TINGKAT</th>
                        <th class="text-center">JURUSAN</th>
                        <th class="text-center">ROMBEL</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $item)
                        <tr class="text-center">
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->tingkat }}</td>
                            <td class="text-left">{{ $item->jurusan->nama_jurusan }}</td>
                            <td>{{ $item->rombel->nama_rombel }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#editKelas{{ $item->nama_kelas }}" title="Edit Kelas"><i class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $item->nama_kelas }}" action="{{ route('admin.delete-kelas', ['nama_kelas' => $item->nama_kelas]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>
                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editKelas{{ $item->nama_kelas }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-kelas', ['nama_kelas' => $item->nama_kelas]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="tingkat" >Tingkat</label>
                                            <select class="form-control input-sm" name="tingkat">
                                                <option value="">-- Pilih Tingkat --</option>
                                                <option value="11" @if ($item->tingkat == '11') selected @endif>11</option>
                                                <option value="12" @if ($item->tingkat == '12') selected @endif>12</option>
                                                <option value="13" @if ($item->tingkat == '13') selected @endif>13</option>
                                            </select>
                                            @error('tingkat')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="jurusan_id" >Nama Jurusan</label>
                                            <select class="form-control input-sm" name="jurusan_kode">
                                                <option value="">-- Pilih Jurusan --</option>
                                                @foreach ($jurusan as $j)
                                                    <option value="{{ $j->kode_jurusan }}" @if ($j->kode_jurusan == $item->jurusan_kode ) selected @endif >{{ $j->nama_jurusan }}</option>
                                                @endforeach
                                            </select>
                                            @error('jurusan_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="required-label faded-label" for="rombel_id" >Rombel</label>
                                            <select class="form-control input-sm" name="rombel_kode">
                                                <option value="">-- Pilih Rombel --</option>
                                                @foreach ($rombel as $r)
                                                    <option value="{{ $r->kode_rombel }}" @if ($r->kode_rombel == $item->rombel_kode) selected @endif>{{ $r->nama_rombel }}</option>
                                                @endforeach
                                            </select>
                                            @error('rombel_id')
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
                                $('#deleteForm{{ $item->nama_kelas }}').submit(function(e){
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

<div class="modal fade tambahKelas" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.store-kelas') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="tingkat" >Tingkat</label>
                <select class="form-control input-sm" name="tingkat">
                    <option value="">-- Pilih Tingkat --</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                </select>
                @error('tingkat')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="jurusan_kode" >Jurusan</label>
                <select class="form-control input-sm" name="jurusan_kode">
                    <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->kode_jurusan }}">{{ $item->nama_jurusan }}</option>
                        @endforeach
                </select>
                @error('jurusan_kode')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="required-label faded-label" for="rombel_kode" >Rombel</label>
                <select class="form-control input-sm" name="rombel_kode">
                    <option value="">-- Pilih Rombel --</option>
                        @foreach ($rombel as $item)
                            <option value="{{ $item->kode_rombel }}">{{ $item->nama_rombel }}</option>
                        @endforeach
                </select>
                @error('rombel_kode')
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