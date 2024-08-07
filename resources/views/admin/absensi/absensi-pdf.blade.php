<!-- resources/views/absensi/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table, th, td {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            border: 0.5px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 5px;
        }
        body{
            font-family: 'Times New Roman', Times, serif;
        }
        .no-border {
            padding-right: 400px !important;
            border: none !important;
        }
        .no-border td {
            border: none !important;
            text-align: left !important;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p>ABSENSI SISWA</p>
    </div>
    <table class="no-border">
    <tr class="no-border">
        <td>Kelas</td>
        <td>: {{ $kelas_id }}</td>
    </tr>
    <tr class="no-border">
        <td>Semester</td>
        <td>: {{ $semester }}</td>
    </tr>
    <tr class="no-border">
        <td>Bulan</td>
        <td>: {{ $bulan }}</td>
    </tr>
</table>

<table style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            @for ($i = 1; $i <= $daysInMonth; $i++)
                <th>{{ $i }}</th>
            @endfor
            <th>M</th>
            <th>S</th>
            <th>I</th>
            <th>A</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensiData as $nis_id => $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nis_id }}</td>
                <td class="text-left">{{ $data['nama'] }}</td>
                @php
                    $countValues = array_count_values($data['status'] ?? []);
                @endphp
                @for ($i = 1; $i <= $daysInMonth; $i++)
                    <td>{{ $data['status'][$i] ?? '-' }}</td>
                @endfor
                <td>{{ $countValues['M'] ?? 0 }}</td>
                <td>{{ $countValues['S'] ?? 0 }}</td>
                <td>{{ $countValues['I'] ?? 0 }}</td>
                <td>{{ $countValues['A'] ?? 0 }}</td>
            </tr>
        @endforeach
    </tbody>    
</table>
</body>
</html>
