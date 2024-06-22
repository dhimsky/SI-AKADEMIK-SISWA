<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_mapel';
    protected $table = 'mapel';
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'jurusan_kode',
    ];
    protected $casts = ['kode_mapel' => 'string'];
    public $timestamps = true;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_kode', 'kode_jurusan');
    }
}