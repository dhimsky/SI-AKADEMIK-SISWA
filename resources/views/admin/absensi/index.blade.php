@extends('layouts.app')
@section('tittle', 'Tabel Absensi Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Table Siswa</div>
            <div class="col-md-9 mt-4 text-right">
                <form action="" method="GET">
                    <div class="row mb-3">
                        <div class="col-md-1">
                            <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1 text-right ">
                <a href="" class="btn btn-info"
                    title="Tambah Absensi">
                    <i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr class="text-center">
                        <th>NIS</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">MAPEL</th>
                        <th class="text-center">KELAS</th>
                        <th class="text-center">TANGGAL</th>
                        <th class="text-center">STATUS ABSEN</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        
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
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
