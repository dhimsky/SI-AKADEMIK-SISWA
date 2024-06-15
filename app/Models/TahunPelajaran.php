<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunPelajaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tahunpelajaran';
    protected $fillable = [
        'tahun_pelajaran'
    ];
}
