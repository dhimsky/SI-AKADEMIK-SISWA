<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_rombel';
    protected $table = 'rombel';
    protected $fillable = [
        'kode_rombel',
        'nama_rombel',
    ];
    protected $casts = ['kode_rombel' => 'string'];
    public $timestamps = true;
}
