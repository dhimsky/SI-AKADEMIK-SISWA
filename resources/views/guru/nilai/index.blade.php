@extends('layouts.app')
@section('tittle', 'Nilai Siswa')
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
                            <div class="m-b-3">{{ $k->jurusan->nama_jurusan }}</div><a href="{{ route('guru.siswa-perkelas') }}"
                            title="Tambah Absensi" class="ti-arrow-right text-light widget-stat-icon"></a>
                            <div><i ></i><small></small></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection