<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public $primaryKey = 'kode_jurusan';
    protected $table = 'jurusan';
    protected $casts = ['kode_jurusan' => 'string'];
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];
    public $timestamps = true;
}
