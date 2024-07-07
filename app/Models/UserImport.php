<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel, WithHeadingRow
{
    use HasFactory;
    public function model(array $row)
    {        
        // if (!isset($row['nis']) || !isset($row['nama_siswa']) || empty($row['nis']) || empty($row['nama_siswa'])) {
        //     return null;
        // }
        return new User([
            'kode_identitas' => $row['nis'],
            'nama_lengkap' => $row['nama_siswa'],
            'role_id' => '3',
            'password' => Hash::make('abcd1234'),
        ]);
    }
}