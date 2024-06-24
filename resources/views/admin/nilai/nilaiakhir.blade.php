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
            padding-right: 130px;
        }
        .no-border-footer p {
            margin-bottom: 60px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
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
                <td>: Ahmad</td>
                <td>Kelas</td>
                <td>: 11-TKJ-A</td>
            </tr>
            <tr class="no-border">
                <td>NIS</td>
                <td>: 112412</td>
                <td>Semester</td>
                <td>: Genap</td>
            </tr>
            <tr class="no-border">
                <td>Sekolah</td>
                <td>: SMK Negeri 1 Cilacap</td>
                <td>Tahun Pelajaran</td>
                <td>: 2022/2023</td>
            </tr>
        </table>

        <div class="header">
            <h6>Penilaian Siswa</h6>
            <h6>Manajemen Perkantoran dan Layanan Bisnis</h6>
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
                    <tr>
                        <td>1</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td class="sub-text" colspan="3">B. Kelompok Mata Pelajaran Kejuruan</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pendidikan Agama dan Budi Pekerti</td>
                        <td>89</td>
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
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Sakit</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p class="text-right">Cilacap, 21 Juni 2023</p>
        <table>
            <tr class="no-border-footer">
                <td>Orang Tua/Wali</td>
                <td>Mengetahui, <br>Kepala Sekolah</td>
                <td>Wali Kelas</td>
            </tr>
            <tr class="no-border-footer">
                <td>(_______________________)</td>
                <td>(_______________________) <br>NIP. </td>
                <td>(_______________________) <br>NIP. </td>
            </tr>
        </table>
    </div>
</body>
</html>