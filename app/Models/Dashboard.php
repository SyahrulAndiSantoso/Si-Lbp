<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;

    public static function getAllLatihan($idPraktikum){
        return DB:: table('latihans')
            ->join('materis','latihans.materi_id','=','materis.id_materi')
            ->select('latihans.id_latihan')
            ->where('materis.praktikum_id','=',$idPraktikum)
            ->get();
    }

    public static function getFinishLatihan($idPraktikum){
        return DB:: table('access_quiz')
            ->join('latihans','latihans.id_latihan','=','access_quiz.latihan_id')
            ->select('latihans.id_latihan')
            ->where('access_quiz.praktikum_id','=',$idPraktikum)
            ->get();
    }

    public static function getLatihanNow($idPraktikan,$idPraktikum){
        return DB:: table('access_quiz')
            ->select('access_quiz.latihan_id','access_quiz.materi_id')
            ->where('access_quiz.praktikum_id','=',$idPraktikum)
            ->where('access_quiz.praktikan_id','=',$idPraktikan)
            ->get();
    }
}
