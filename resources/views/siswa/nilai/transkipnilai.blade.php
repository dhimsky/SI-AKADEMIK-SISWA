@extends('layouts.app')
@section('tittle', 'Transkip Nilai')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head col-md-12">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('siswa.transkip_pdf', ['id' => Auth()->user()->kode_identitas]) }}" class="btn btn-warning" target="_blank"><i
                            class="fa fa-print font-14"></i> Cetak</a>
                    </div>
            </div>
            <div class="ibox-body">
                <div class="content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2">No</th>
                                <th class="text-center align-middle" rowspan="2">Mata Pelajaran</th>
                                <th class="text-center align-middle" colspan="6">Nilai Akhir Semester</th>
                                <th class="text-center align-middle" rowspan="2">PSAJ</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle">I</th>
                                <th class="text-center align-middle">II</th>
                                <th class="text-center align-middle">III</th>
                                <th class="text-center align-middle">IV</th>
                                <th class="text-center align-middle">V</th>
                                <th class="text-center align-middle">VI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="sub-text" colspan="9"><strong>A. Kelompok Mata Pelajaran Umum</strong></td>
                            </tr>
                            @foreach ($mapelumum as $index => $mapel)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $index }}</td>
                                    @for ($semester = 1; $semester <= 6; $semester++)
                                        @php
                                            $nilai = $mapel->firstWhere('semester', $semester);
                                        @endphp
                                        <td class="text-center align-middle">{{ $nilai ? $nilai->nilai_akhir : '-' }}</td>
                                        @endfor
                                        <td class="text-center align-middle">
                                            @php
                                                $psaj = $mapel->firstWhere('psaj');
                                            @endphp
                                            {{ $psaj ? $psaj->psaj : '-' }}
                                        </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="sub-text" colspan="9"><strong>B. Kelompok Mata Pelajaran Kejuruan</strong></td>
                            </tr>
                            @foreach ($mapelkejuruan as $index => $mapel)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $index }}</td>
                                    @for ($semester = 1; $semester <= 6; $semester++)
                                        @php
                                            $nilai = $mapel->firstWhere('semester', $semester);
                                        @endphp
                                        <td class="text-center align-middle">{{ $nilai ? $nilai->nilai_akhir : '-' }}</td>
                                    @endfor
                                    <td class="text-center align-middle">{{ $mapel->first()->nilai_psaj ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <div class="keterangan">
                    <div><strong>Keterangan:</strong></div>
                    <div>Rata-rata Nilai Semester I-VI : {{ number_format($rataRataNilaiSemester, 2) }}</div>
                    <div>Rata-rata Nilai PSAJ : {{ number_format($rataRataNilaiPSAJ, 2) }}</div>
                    <div>Rata-rata : {{ number_format(($rataRataNilaiSemester + $rataRataNilaiPSAJ) / 2, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
