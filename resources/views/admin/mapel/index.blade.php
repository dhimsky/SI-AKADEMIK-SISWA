@extends('layouts.app')
@section('tittle', 'Tabel Mapel')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Mapel</div>
                <div class="col-md-2 text-right ">
                    <a href="" data-toggle="modal" data-target=".tambahMapel" class="btn btn-info"
                        title="Tambah Mapel">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>KODE MAPEL</th>
                            <th>NAMA MAPEL</th>
                            <th>JURUSAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $item)
                            <tr class="text-center">
                                <td>{{ $item->kode_mapel }}</td>
                                <td>{{ $item->nama_mapel }}</td>
                                <td>
                                    @if ($item->jurusan)
                                        {{ $item->jurusan->nama_jurusan }}
                                    @else
                                        Umum
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                        data-target="#editJurusan{{ $item->kode_mapel }}" title="Edit role"><i
                                            class="fa fa-pencil font-14"></i></button>
                                    <form id="deleteForm{{ $item->kode_mapel }}" action="{{ route('admin.delete-mapel', ['kode_mapel' => $item->kode_mapel]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editJurusan{{ $item->kode_mapel }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Jurusan</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update-mapel', ['kode_mapel' => $item->kode_mapel]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="kode_mapel">Kode Mapel</label>
                                                    <input type="text" name="kode_mapel"
                                                        class="form-control @error('kode_mapel') is-invalid @enderror" value="{{ $item->kode_mapel }}" placeholder="Masukan kode">
                                                    @error('kode_mapel')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="nama_mapel">Nama Mapel</label>
                                                    <input type="text" name="nama_mapel"
                                                        class="form-control @error('nama_mapel') is-invalid @enderror" value="{{ $item->nama_mapel }}"
                                                        placeholder="Masukan nama mapel">
                                                    @error('nama_mapel')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="jurusan_kode">Jurusan</label>
                                                    <select class="form-control input-sm" name="jurusan_kode">
                                                        <option value="">-- Pilih Jurusan --</option>
                                                        @foreach ($jurusan as $j)
                                                            <option value="{{ $j->kode_jurusan }}" @if ($j->kode_jurusan == $item->jurusan_kode ) selected @endif >{{ $j->nama_jurusan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jurusan_kode')
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
                                    $('#deleteForm{{ $item->kode_mapel }}').submit(function(e){
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

    <div class="modal fade tambahMapel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store-mapel') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="kode_mapel">Kode Mapel</label>
                            <input type="text" name="kode_mapel"
                                class="form-control @error('kode_mapel') is-invalid @enderror" placeholder="Masukan Kode">
                            @error('kode_mapel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="nama_mapel">Nama Mapel</label>
                            <input type="text" name="nama_mapel"
                                class="form-control @error('nama_mapel') is-invalid @enderror"
                                placeholder="Masukan nama mapel">
                            @error('nama_mapel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="required-label faded-label" for="jurusan_kode">Jurusan</label>
                            <select class="form-control input-sm" name="jurusan_kode">
                                <option value="">Umum</option>
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
