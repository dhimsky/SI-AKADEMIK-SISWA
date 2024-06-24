<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nisn_id',
        'tanggal_absensi',
        'status_absensi',
        'semester',
        'kelas',
        'tahun_pelajaran',
    ];
}