@extends('layouts.app')
@section('tittle', 'Tabel Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="col-md-7 mt-4 text-right">
                <form action="" method="GET">
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <select id="kelas_id" name="kelas_id" class="form-control">
                                <option selected value="">Semua Kelas</option>
                                @foreach ($kelas as $k)
                                <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <select id="angkatan_id" name="angkatan_id" class="form-control">
                                <option selected value="">Semua Angkatan</option>
                                @foreach ($angkatan as $a)
                                <option value="{{ $a->kode_angkatan }}">{{ $a->tahun_angkatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5 text-right ">
                <a href="{{ route('kepsek.nonsiswa') }}" class="btn btn-danger"
                    title="Lihat data siswa tidak aktif">
                    <i class="fa fa-user"></i> Non Siswa</a>
            </div>
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
                    @foreach ($siswa as $s)
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection