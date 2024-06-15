<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'nilai';
    protected $fillable = [
        'nisn_id',
        'mapel_kode',
        'semester',
        'tahun_pelajaran',
        'kelas',
        'value',
    ];
    public function siswa()
    {
        return $this->belongsTo(Kelas::class, 'nisn_id', 'nisn');
    }
    public function mapel()
    {
        return $this->belongsTo(Kelas::class, 'mapel_kode', 'kode_mapel');
    }
}