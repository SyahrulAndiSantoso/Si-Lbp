<?php

namespace App\Models;

use Database\Seeders\latihan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Praktikan extends Authenticatable
{
    use HasFactory;
    protected $table = "praktikans";
    protected $primaryKey = 'id_praktikan';
    protected $fillable = [
        'npm',
        'password',
        'nama_praktikan',
        'notelp',
        'email',
    ];


    // public function praktikum()
    // {
    //     return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    // }

    // public function latihan()
    // {
    //     return $this->hasMany(latihan::class, 'latihan_id', 'id_latihan');
    // }

    public function AccessQuiz(){
        return $this->belongsToMany('praktikan_id','id_praktikan');
    }

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    }
}
