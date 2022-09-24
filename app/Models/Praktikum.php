<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_praktikum';
    protected $guarded = ['id_praktikum'];

    public function latihan(){
        return $this->hasMany(latihan::class,'praktikum_id','id_praktikum');
    }

    public function AccessQuiz(){
        return $this->belongsToMany('praktikum_id','id_praktikum');
    }
}
