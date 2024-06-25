<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'kode_identitas';
    public $incrementing = false; // Karena kolom 'nim' bukan auto-increment
    public $timestamps = true;
    
    protected $fillable = [
        'kode_identitas',
        'nama_lengkap',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'kode_identitas' => 'string',
    ];

    public function Role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function guru(){
        return $this->hasOne(Guru::class, 'nip', 'kode_identitas');
    }
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nis', 'kode_identitas');
    }
}