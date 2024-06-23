<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel, WithHeadingRow
{
    use HasFactory;
    public function model(array $row)
    {        
        return new User([
            'kode_identitas' => $row['nis'],
            'nama_lengkap' => $row['nama_siswa'],
            'role_id' => '3',
            'password' => $row['nis'],
        ]);
    }
}