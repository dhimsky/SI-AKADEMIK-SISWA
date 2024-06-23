<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailur;

class SiswaImport implements ToModel, WithValidation, WithHeadingRow
{
    use HasFactory;
    public function model(array $row)
    {   
        Log::info('Row Data:', $row);
        $angkatan = Angkatan::where('tahun_angkatan', $row['angkatan'])->first();
        $kode_angkatan = $angkatan ? $angkatan->kode_angkatan : null;
        
        $tahunpelajaran = TahunPelajaran::where('tahun_pelajaran', $row['tahun_pelajaran'])->first();
        $tahunpelajaran_id = $tahunpelajaran ? $tahunpelajaran->id : null;

        return new Siswa([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama_siswa' => $row['nama_siswa'],
            'kelas_id' => $row['kelas'],
            'semester' => $row['semester'],
            'angkatan_id' => $kode_angkatan,
            'tahunpelajaran_id' => $tahunpelajaran_id,
            'status_siswa' => 'Aktif',
        ]);
    }

    public function rules(): array
    {
        return [
            'nis' => 'required|unique:siswa,nis',
            'nisn' => 'required|unique:siswa,nisn',
        ];
    }
}