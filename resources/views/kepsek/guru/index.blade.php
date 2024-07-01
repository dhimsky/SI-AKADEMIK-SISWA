@extends('layouts.app')
@section('tittle', 'Tabel Guru')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th class="text-center">NIP</th>
                        <th class="text-center">NAMA LENGKAP</th>
                        <th class="text-center">MATA PELAJARAN</th>
                        <th class="text-center">SEBAGAI WALI KELAS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                        <tr class="text-center">
                            <td>{{ $item->nip }}</td>
                            <td class="text-left">{{ $item->nama_guru }}</td>
                            <td class="text-left">{{ $item->mapel->nama_mapel }}</td>
                            <td>{{ $item->kelas_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection