@extends('layouts.app')
@section('tittle', 'Tabel Siswa Tidak Aktif')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">NAMA LENGKAP</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">JURUSAN</th>
                            <th class="text-center">SEMESTER</th>
                            <th class="text-center">ANGKATAN</th>
                            <th class="text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nonsiswas as $s)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td class="text-left">{{ $s->nama_siswa }}</td>
                            <td>{{ $s->kelas_id }}</td>
                            <td class="text-left">{{ $s->kelas->jurusan->nama_jurusan }}</td>
                            <td>{{ $s->semester }}</td>
                            <td>{{ $s->angkatan->tahun_angkatan}}</td>
                            <td>
                                @if ($s->status_siswa == 'Aktif')
                                <span class="badge badge-success">{{ $s->status_siswa }}</span>
                                @else
                                <span class="badge badge-danger">{{ $s->status_siswa }}</span>
                                @endif
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
