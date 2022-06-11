<?php

namespace App\Models;

use App\Models\Praktikum;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';
    protected $primaryKey = 'id_materi';
    protected $fillable = [
        "praktikum_id",
        "nama_materi",
        "isi_materi",
    ];

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    }
    

    // public function latihan()
    // {
    //     return $this->hasMany(latihan::class, 'latihan_id', 'id_latihan');
    // }

    public function AccessQuiz(){
        return $this->belongsToMany('materi_id','id_materi');
    }

    public function getMateri(){
        return  DB::table('materis')
            ->join('praktikums','materis.praktikum_id','=','praktikums.id_praktikum')
            ->select('materis.*','praktikums.nama_praktikum')
            ->get();
    }


}
