<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'role';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'level',
    ];
    public function user(){
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}