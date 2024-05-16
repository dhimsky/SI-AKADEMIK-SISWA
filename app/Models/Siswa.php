<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';
    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nama_lengkap',
    ];
    protected $casts = ['kode_rombel' => 'string'];
    public $timestamps = true;
}
