@extends('layouts.app')
@section('tittle', 'Tabel Transkrip Nilai Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Transkrip Nilai Siswa</div>
                <div class="col-md-9 mt-4 text-right">
                    <form action="" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-1">
                                <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>NIS</th>
                            <th>NAMA SISWA</th>
                            <th class="text-center">SEMESTER</th>
                            <th class="text-center">TAHUN PELAJARAN</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">STATUS SISWA</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($siswa as $n)
                            <td class="text-center">{{ $n->nis }}</td>
                            <td>{{ $n->nama_siswa }}</td>
                            <td class="text-center">{{ $n->semester }}</td>
                            <td class="text-center">{{ $n->tahunpelajaran->tahun_pelajaran }}</td>
                            <td class="text-center">{{ $n->kelas_id }}</td>
                            <td class="text-center">
                                @if ($n->status_siswa == 'Aktif')
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $n->status_siswa }}</span>
                                @else
                                    <span class="badge badge-danger badge-pill m-r-5 m-b-5">{{ $n->status_siswa }}</span>
                                @endif
                            </td>                            
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin.transkip_pdf') }}" class="btn btn-default btn-xs m-r-5" target="_blank"><i
                                    class="fa fa-print font-14"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
