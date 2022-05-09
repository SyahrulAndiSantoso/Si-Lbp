<?php

namespace App\Models;

use App\Models\Materi;
use GuzzleHttp\Psr7\Request;
use Database\Seeders\latihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessQuiz extends Model
{
    use HasFactory;

    protected $table = 'access_quiz';
    protected $primaryKey = 'idAccessQuiz';
    protected $fillable = [
        "praktikan_id",
        "praktikum_id",
        "materi_id",
    ];

    public function praktikum(){
        return $this->belongsToMany('praktikum_id','id_praktikum');
    }

    public function praktikan(){
        return $this->belongsToMany('praktikan_id','id_praktikan');
    }

    public function materi(){
        return $this->belongsToMany('materi_id','id_materi');
    }
    

    public function Quiz($id_praktikan, $id_praktikum){
       return DB::table('access_quiz')
            ->join('praktikans' , 'access_quiz.praktikan_id','=','praktikans.id_praktikan')
            ->join('praktikums' , 'access_quiz.praktikum_id', '=', 'praktikums.id_praktikum')
            ->join('materis','access_quiz.praktikum_id','=', 'materis.praktikum_id')
            ->select('access_quiz.*','materis.*')
            ->where('access_quiz.praktikan_id','=',$id_praktikan)
            ->where('access_quiz.praktikum_id','=',$id_praktikum)
            ->get();
    }

    public function getIdPraktikumFromMateri($idMateri){
        return Materi::find($idMateri)->praktikum_id;
    }

    public function getIdLatihanFromAccessQuiz($idPraktikum, $idLatihan, $idPraktikan){
       return DB::table('access_quiz')
            ->join('materis','access_quiz.materi_id','=','materis.id_materi')
            ->join('latihans','materis.id_materi','=','latihans.materi_id')
            ->select('latihans.id_latihan')
            ->where('access_quiz.praktikum_id','=',$idPraktikum)
            ->where('access_quiz.praktikan_id','=',$idPraktikan)
            ->where('latihans.id_latihan','=',$idLatihan)
            ->get();   
    }

    public function getAllLatihan($idPraktikum){
        return DB:: table('latihans')
            ->join('materis','latihans.materi_id','=','materis.id_materi')
            ->select('latihans.id_latihan')
            ->where('materis.praktikum_id','=',$idPraktikum)
            ->get();
    }

    public function updateLatihanOnUser($idPraktikum, $idPraktikan, $idbaru){
      return  DB::table('access_quiz')
        ->where('praktikan_id', $idPraktikan)
        ->where('praktikum_id', $idPraktikum)
        ->update(array('materi_id' => $idbaru));
    }
}

