<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nis';
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
        'nis' => 'required|unique:siswa,nis',
        'nisn' => 'required|unique:siswa,nisn',
        'nama_siswa' => 'required',
        'kelas_id' => 'required|exists:kelas,nama_kelas',
        'angkatan_id' => 'required|exists:angkatan,kode_angkatan',
        'status_siswa' => 'required',
        'password' => 'required',
    ];
    
    public static $messages = [
        'nis.required' => 'NIS tidak boleh kosong!',
        'nisn.required' => 'NISN tidak boleh kosong!',
        'nis.unique' => 'NIS sudah digunakan!',
        'nisn.unique' => 'NISN sudah digunakan!',
        'nama_siswa.required' => 'Nama siswa tidak boleh kosong!',
        'kelas_id.required' => 'Kelas tidak boleh kosong!',
        'kelas_id.exists' => 'Kelas yang dipilih tidak valid!',
        'angkatan_id.required' => 'Angkatan tidak boleh kosong!',
        'angkatan_id.exists' => 'Angkatan yang dipilih tidak valid!',
        'status_siswa.required' => 'Status siswa tidak boleh kosong!',
        'password.required' => 'Password tidak boleh kosong!',
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
        return $this->hasMany(Nilai::class, 'nis_id', 'nis');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nis', 'kode_identitas');
    }
}