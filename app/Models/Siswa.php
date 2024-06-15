<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';
    protected $table = 'siswa';
    public $timestamps = true;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas_id',
        'semester',
        'angkatan_id',
        'tahunpelajaran_id',
        'status_siswa',
    ];

    public static $rules = [
        'nisn' => 'required|unique:siswa,nisn',
        'nama_siswa' => 'required',
        'kelas_id' => 'required|exists:kelas,nama_kelas',
        'angkatan_id' => 'required|exists:angkatan,kode_angkatan',
        'status_siswa' => 'required',
    ];
    
    public static $messages = [
        'nisn.required' => 'NISN tidak boleh kosong!',
        'nisn.unique' => 'NISN sudah digunakan!',
        'nama_siswa.required' => 'Nama siswa tidak boleh kosong!',
        'kelas_id.required' => 'Kelas tidak boleh kosong!',
        'kelas_id.exists' => 'Kelas yang dipilih tidak valid!',
        'angkatan_id.required' => 'Angkatan tidak boleh kosong!',
        'angkatan_id.exists' => 'Angkatan yang dipilih tidak valid!',
        'status_siswa.required' => 'Status siswa tidak boleh kosong!',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'nama_kelas');
    }
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatan_id', 'kode_angkatan');
    }
    public function tahunpelajaran()
    {
        return $this->belongsTo(TahunPelajaran::class, 'tahunpelajaran_id', 'id');
    }
    public function nilai()
    {
        return $this->hasMany(Siswa::class, 'nisn_id', 'nisn');
    }
}