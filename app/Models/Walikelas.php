<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory;

    protected $table = 'walikelas';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'nama_lengkap',
        'jenis_kelamin',
        'kelas_id',
        'email',
        'password',
    ];
    protected $casts = ['nip' => 'string'];
    public $timestamps = true;

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'nama_kelas');
    }
}
