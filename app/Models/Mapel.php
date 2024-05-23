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
    ];
    protected $casts = ['kode_mapel' => 'string'];
    public $timestamps = true;
}
