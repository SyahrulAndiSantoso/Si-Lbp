<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihans';
    protected $primaryKey = 'id_latihan';
    protected $fillable = [
        "praktikum_id",
        "materi_id",
        "soal",
        "jawaban",
        "kisi_kisi",
    ];

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    }

    public function materi()
    {
        return $this->belongsTo(materi::class, 'materi_id', 'id_materi');
    }

    public function kisi_kisi()
    {
        return $this->hasMany(Kisi_Kisi::class, 'kisi_kisi_id', 'id_kisi_kisi');
    }
}
