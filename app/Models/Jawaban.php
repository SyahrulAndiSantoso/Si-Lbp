<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    protected $fillable = [
        'praktikan_id',
        'latihan_id',
        'jawaban',
        'hasil',
    ];




     public static function getJawaban(){
        return DB:: table('jawaban')
            ->join('latihans','latihans.id_latihan','=','jawaban.latihan_id')
            ->join('praktikans','praktikans.id_praktikan','=','jawaban.praktikan_id')
            ->join('praktikums','praktikums.id_praktikum','=','latihans.praktikum_id')
            ->select('jawaban.*','praktikans.nama_praktikan','latihans.nama_latihan','praktikums.nama_praktikum')
            ->get();
    }
     public static function getPenilaian($idpraktikan,$idlatihan){
        return DB:: table('jawaban')
            ->join('latihans','latihans.id_latihan','=','jawaban.latihan_id')
            ->join('praktikans','praktikans.id_praktikan','=','jawaban.praktikan_id')
            ->join('praktikums','praktikums.id_praktikum','=','latihans.praktikum_id')
            ->select('jawaban.*','praktikans.nama_praktikan','latihans.nama_latihan','latihans.soal','latihans.praktikum_id')
            ->where('jawaban.praktikan_id','=',$idpraktikan)
            ->where('jawaban.latihan_id','=',$idlatihan)
            ->get();
    }
    
}