<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 1.5px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 15px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .content table th,
        .content table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        .content table th {
            background-color: #f2f2f2;
        }
        .no-border {
            padding-right: 400px !important;
            border: none !important;
        }
        .no-border td {
            border: none !important;
            text-align: left !important;
        }
        .no-border-footer td {
            border: none !important;
            text-align: center !important;
            padding-bottom: 60px;
            ;
        }
        .no-border-footer p {
            margin-bottom: 0px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-left: 80%;
        }
        .footer .signature {
            text-align: left;
            margin-top: 10px;
        }
        .footer .signature p {
            margin-bottom: 10px;
        }
        .footer .signature .name {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .footer .signature .position {
            font-style: italic;
        }
        .signature {
            display: inline-block; /* Ensure inline display for signatures */
        }
        .table-wrapper {
            max-width: 200px;
            overflow-y: auto;
        }
        .sub-text{
            font-weight: bold;
            text-align: left !important;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <p>TRANSKIP NILAI <br> TAHUN PELAJARAN 2022/2023</p>
        </div>

        <table class="no-border">
            <tr class="no-border">
                <td>Nama</td>
                <td>: {{ $siswa->nama_siswa }}</td>
            </tr>
            <tr class="no-border">
                <td>NIS</td>
                <td>: {{ $siswa->nis }}</td>
            </tr>
            <tr class="no-border">
                <td>Kopetensi Keahlian</td>
                <td>: {{ $siswa->kelas->jurusan->nama_jurusan }}</td>
            </tr>
        </table>
        
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Mata Pelajaran</th>
                    <th colspan="6">Nilai Akhir Semester</th>
                    <th rowspan="2">PSAJ</th>
                </tr>
                <tr>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                    <th>V</th>
                    <th>VI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="sub-text" colspan="9"><strong>A. Kelompok Mata Pelajaran Umum</strong></td>
                </tr>
                @foreach ($mapelumum as $index => $mapel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $index }}</td>
                        @for ($semester = 1; $semester <= 6; $semester++)
                            @php
                                $nilai = $mapel->firstWhere('semester', $semester);
                            @endphp
                            <td>{{ $nilai ? $nilai->nilai_akhir : '-' }}</td>
                            @endfor
                            <td>
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
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $index }}</td>
                        @for ($semester = 1; $semester <= 6; $semester++)
                            @php
                                $nilai = $mapel->firstWhere('semester', $semester);
                            @endphp
                            <td>{{ $nilai ? $nilai->nilai_akhir : '-' }}</td>
                        @endfor
                        <td>{{ $mapel->first()->nilai_psaj ?? '-' }}</td>
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

    <div class="footer">
        @php
            $bulanIndonesia = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
            ];
        @endphp
        @php
            $tanggal = \Carbon\Carbon::now();
            $hari = $tanggal->format('d');
            $bulan = $bulanIndonesia[$tanggal->format('n')];
            $tahun = $tanggal->format('Y');
        @endphp
        <p class="text-right">Cilacap, {{ $hari }} {{ $bulan }} {{ $tahun }}</p>
        <table>
            <tr class="no-border-footer">
                <td>Kepala Sekolah</td>
            </tr>
            <tr class="no-border-footer">
                <td>(_______________________) <br>NIP. </td>
            </tr>
        </table>
    </div>
</html>