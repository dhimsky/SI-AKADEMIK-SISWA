@extends('layouts.app')
@section('tittle', 'Absensi Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                @foreach ($kelas as $k)
                <div class="col-lg-4 col-md-4 mt-3">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $k->nama_kelas }}</h2>
                            <div class="m-b-3 mr-5">{{ $k->jurusan->nama_jurusan }}</div><a href="{{ route('admin.absensi-perkelas', ['kelas_id' => $k->nama_kelas]) }}" class="ti-arrow-right text-light widget-stat-icon"></a>
                            <div></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">NO</th>
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
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
