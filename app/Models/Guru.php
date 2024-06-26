<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'nama_guru',
        'kelas_id',
        'mapel_kode',
    ];
    protected $casts = [
        'nip' => 'string',
    ];
    public $timestamps = true;

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'nama_kelas');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_kode', 'kode_mapel');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'nip', 'kode_identitas');
    }
}