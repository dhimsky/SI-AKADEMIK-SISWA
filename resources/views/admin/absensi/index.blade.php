@extends('layouts.app')
@section('tittle', 'Tabel Absensi Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="row">
            @foreach ($kelas as $k)
            <div class="col-lg-3 col-md-6 mt-3 ml-3">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $k->nama_kelas }}</h2>
                        <div class="m-b-3">{{ $k->jurusan->nama_jurusan }}</div><a href="" data-toggle="modal" data-target=".tambahAbsen"
                        title="Tambah Absensi" class="ti-arrow-right text-light widget-stat-icon"></a>
                        <div><i ></i><small></small></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">KELAS</th>
                        <th class="text-center">STATUS ABSEN</th>
                        <th class="text-center">TANGGAL ABSEN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    {{-- VALIDASI DELETE --}}
                    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        $(document).ready(function(){
                            $('#deleteForm').submit(function(e){
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahAbsen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Absensi Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-3" id="date_1">
                        <label class="font-normal">Tanggal</label>
                        <div class="input-group date">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" id="tanggal_absensi" name="tanggal_absensi">
                        </div>
                        @error('tanggal_absensi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById('tanggal_absensi').value = today;
                        });
                    </script>
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Masuk</th>
                                <th class="text-center">Izin</th>
                                <th class="text-center">Sakit</th>
                                <th class="text-center">Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  class="text-center">1</td>
                                <td>Dibyo Anjay Mabar</td>
                                <td class="text-center">
                                    <label class="ui-radio ui-radio-success">
                                        <input type="radio" name="test2">
                                        <span class="input-span"></span></label>
                                </td>
                                <td class="text-center">
                                    <label class="ui-radio ui-radio-info">
                                        <input type="radio" name="test2">
                                        <span class="input-span"></span></label>
                                </td>
                                <td class="text-center">
                                    <label class="ui-radio ui-radio-info">
                                        <input type="radio" name="test2">
                                        <span class="input-span"></span></label>
                                </td>
                                <td class="text-center">
                                    <label class="ui-radio ui-radio-danger">
                                        <input type="radio" name="test2">
                                    <span class="input-span"></span></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
