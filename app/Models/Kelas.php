<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'nama_kelas';
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jurusan_kode',
        'rombel_kode',
        'tingkat',
    ];
    protected $casts = ['nama_kelas' => 'string'];
    public $timestamps = true;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_kode', 'kode_jurusan');
    }
    
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_kode', 'kode_rombel');
    }

    public function guru() {
        return $this->hasMany(Guru::class, 'kelas_id', 'nama_kelas');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'nama_kelas');
    }
}