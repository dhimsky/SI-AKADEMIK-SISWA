@extends('layouts.app')
@section('tittle', 'Absensi Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">NO</th>
                                    <th class="text-center">TANGGAL</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $a)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($a->tanggal_absensi)->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @if ($a->status_absensi == 'M')
                                            <span class="badge badge-success">{{ $a->status_absensi }}</span>
                                            @elseif ($a->status_absensi == 'I')
                                            <span class="badge badge-info">{{ $a->status_absensi }}</span>
                                            @elseif ($a->status_absensi == 'S')
                                            <span class="badge badge-warning">{{ $a->status_absensi }}</span>
                                            @elseif ($a->status_absensi == 'A')
                                            <span class="badge badge-danger">{{ $a->status_absensi }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection