<?php

namespace App\Models;

use Database\Seeders\praktikan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihans';
    protected $primaryKey = 'id_latihan';
    protected $fillable = [
        "materi_id",
        "soal",
        "jawaban",
        "kisi_kisi",
    ];

    // public function praktikum()
    // {
    //     return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    // }

    public function materi()
    {
        return $this->belongsTo(materi::class, 'materi_id', 'id_materi');
    }

    // public function praktikan()
    // {
    //     return $this->belongsTo(praktikan::class, 'latihan_id', 'id_latihan');
    // }

    public function AccessQuiz(){
        return $this->belongsToMany('latihan_id','id_latihan');
    }
}
