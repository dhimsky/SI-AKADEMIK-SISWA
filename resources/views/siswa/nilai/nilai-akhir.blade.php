@extends('layouts.app')
@section('tittle', 'Nilai Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
                <div class="col-md-12 mb-3 text-right">
                    <form action="{{ route('siswa.nilaiakhir_pdf', [Auth()->user()->kode_identitas]) }}" target="_blank" method="post" class="form-inline d-inline">
                        @csrf
                        <select id="semesterFilter" name="semester" class="form-control">
                            <option selected value="">Semua Semester</option>
                            <option value="1">Satu (1)</option>
                            <option value="2">Dua (2)</option>
                            <option value="3">Tiga (3)</option>
                            <option value="4">Empat (4)</option>
                            <option value="5">Lima (5)</option>
                            <option value="6">Enam (6)</option>
                        </select>
                        <button type="submit" class="btn btn-warning" onclick="openNewPage()"
                            title="Cetak Nilai" target="_blank">
                            <i class="fa fa-print"></i> Cetak</button>
                    </form>
                </div>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">NO</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">MAPEL</th>
                        <th class="text-center">SEMESTER</th>
                        <th class="text-center">TAHUN PELAJARAN</th>
                        <th class="text-center">UH</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                        <th class="text-center">NILAI AKHIR</th>
                        <th class="text-center">PSAJ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $n)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $n->siswa->nama_siswa }}</td>
                            <td class="text-left">{{ $n->mapel->nama_mapel }}</td>
                            @if ($n->semester % 2 == 0)
                                <td>Genap</td>
                            @else
                                <td>Ganjil</td>
                            @endif
                            <td>{{ $n->tahun_pelajaran }}</td>
                            <td>{{ $n->ulangan_harian }}</td>
                            <td>{{ $n->uts }}</td>
                            <td>{{ $n->uas }}</td>
                            <td>
                                @if ($n->nilai_akhir >= 75)
                                <span class="badge badge-success">{{ $n->nilai_akhir }}</span>
                                @else
                                <span class="badge badge-warning">{{ $n->nilai_akhir }}</span>
                                @endif
                            </td>
                            <td>{{ $n->psaj }}</td>
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