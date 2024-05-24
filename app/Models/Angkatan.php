<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_angkatan';
    protected $table = 'angkatan';
    protected $fillable = [
        'kode_angkatan',
        'tahun_angkatan',
    ];
    protected $casts = ['kode_angkatan' => 'string'];
    public $timestamps = true;
}
