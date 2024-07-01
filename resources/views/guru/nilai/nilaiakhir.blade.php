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
            padding-right: 105px;
        }
        .no-border-footer p {
            margin-bottom: 60px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 3px;
        }
        .footer .signature {
            text-align: left;
            margin-top: 10px;
        }
        .footer .signature p {
            margin-bottom: 60px;
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
            padding-left: 50px;
        }
        .table-mapel {
            max-width: 600px;
            overflow-y: auto;
            padding-left: 50px;
        }
        .sub-text{
            font-weight: bold;
            text-align: left !important;
        }
    </style>
</head>
<body>
    <div class="content">
        <table class="no-border">
            <tr class="no-border">
                <td>Nama Peserta Didik</td>
                <td>: {{ $siswa->nama_siswa }}</td>
                <td>Kelas</td>
                <td>: {{ $siswa->kelas_id }}</td>
            </tr>
            <tr class="no-border">
                <td>NIS</td>
                <td>: {{ $siswa->nis }}</td>
                <td>Semester</td>
                @if ($siswa->semester % 2 == 0)
                    <td>: Genap</td>
                @else
                    <td>: Ganjil</td>
                @endif
            </tr>
            <tr class="no-border">
                <td>Sekolah</td>
                <td>: SMK Negeri 1 Cilacap</td>
                <td>Tahun Pelajaran</td>
                <td>: {{ $siswa->tahunpelajaran->tahun_pelajaran }}</td>
            </tr>
        </table>

        <div class="header">
            <h6>Penilaian Siswa</h6>
            <h6>{{ $siswa->kelas->jurusan->nama_jurusan }}</h6>
        </div>
        <br>

        <div class="table-mapel">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="sub-text" colspan="3">A. Kelompok Mata Pelajaran Umum</td>
                    </tr>
                    @foreach ($mapelumum as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-left">{{ $m->nama_mapel }}</td>
                            <td>{{ isset($m->nilai_akhir) ? $m->nilai_akhir : '-' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="sub-text" colspan="3">B. Kelompok Mata Pelajaran Kejuruan</td>
                    </tr>
                    @foreach ($mapelkejuruan as $index => $m)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td  class="text-left">{{ $m->nama_mapel }}</td>
                        <td>{{ isset($m->nilai_akhir) ? $m->nilai_akhir : '-' }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        @php
                            $totalNilaiUmum = 0;
                            $countNilaiUmum = 0;
                            foreach ($mapelumum as $m) {
                                if (isset($m->nilai_akhir)) {
                                    $totalNilaiUmum += $m->nilai_akhir;
                                    $countNilaiUmum++;
                                }
                            }
                            $rataRataUmum = $countNilaiUmum > 0 ? $totalNilaiUmum / $countNilaiUmum : 0;
                            $totalNilaiKejuruan = 0;
                            $countNilaiKejuruan = 0;
                            foreach ($mapelkejuruan as $m) {
                                if (isset($m->nilai_akhir)) {
                                    $totalNilaiKejuruan += $m->nilai_akhir;
                                    $countNilaiKejuruan++;
                                }
                            }
                            $rataRataKejuruan = $countNilaiKejuruan > 0 ? $totalNilaiKejuruan / $countNilaiKejuruan : 0;
                            $totalNilaiKeseluruhan = $totalNilaiUmum + $totalNilaiKejuruan;
                            $countNilaiKeseluruhan = $countNilaiUmum + $countNilaiKejuruan;
                            $rataRataKeseluruhan = $countNilaiKeseluruhan > 0 ? $totalNilaiKeseluruhan / $countNilaiKeseluruhan : 0;
                        @endphp
                        <td colspan="2" class="text-center"><b>Rata-Rata Nilai Akhir</b></td>
                        <td>{{ number_format($rataRataKeseluruhan, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kehadiran</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sakit</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Sakit</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
                <td>Orang Tua/Wali</td>
                <td>Mengetahui, <br>Kepala Sekolah</td>
                <td>Wali Kelas</td>
            </tr>
            <tr class="no-border-footer">
                <td>----------------------------------------</td>
                @if ($kepsek)
                <td>{{ $kepsek->nama_lengkap }}<br>----------------------------------------<br>NIP. {{ $kepsek->kode_identitas }}</td>
                @else
                <td><br>----------------------------------------<br>NIP. </td>
                @endif
                @if ($namaWaliKelas)
                <td>{{ $namaWaliKelas->nama_guru }}<br>----------------------------------------<br>NIP. {{ $namaWaliKelas->nip }}</td>
                @else
                <td><br>----------------------------------------<br>NIP. </td>
                @endif
            </tr>
        </table>
    </div>
</body>
</html>