@extends('layouts.app')
@section('tittle', 'Nilai Siswa Perkelas')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">NO</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">KELAS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        @foreach ($siswa as $n)
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $n->nis }}</td>                           
                        <td class="text-left">{{ $n->nama_siswa }}</td>                           
                        <td class="text-center">{{ $n->kelas->nama_kelas }}</td>                           
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('kepsek.siswa.nilai', ['id' => $n->nis]) }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection