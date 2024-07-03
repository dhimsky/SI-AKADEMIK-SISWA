@extends('layouts.app')
@section('tittle', 'Dashboard Staff TU')
@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jmlsiswa }}</h2>
                    <div class="m-b-5">JUMLAH SISWA</div><i class="fa fa-graduation-cap widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jmlguru }}</h2>
                    <div class="m-b-5">JUMLAH GURU</div><i class="fa fa-user-circle widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jmljurusan }}</h2>
                    <div class="m-b-5">JUMLAH JURUSAN</div><i class="fa fa-star widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jmlkelas }}</h2>
                    <div class="m-b-5">JUMLAH KELAS</div><i class="fa fa-building-o widget-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
</div>
@endsection