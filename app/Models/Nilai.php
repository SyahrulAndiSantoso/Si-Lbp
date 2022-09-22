<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'praktikan_id',
        'praktikum_id',
        'latihan_id',
        'nilai',
    ];

    public static function getNilai(){
        return DB:: table('nilai')
            ->join('latihans','latihans.id_latihan','=','nilai.latihan_id')
            ->join('praktikans','praktikans.id_praktikan','=','nilai.praktikan_id')
            ->join('praktikums','praktikums.id_praktikum','=','nilai.praktikum_id')
            ->select('nilai.*','praktikans.npm','praktikans.nama_praktikan','latihans.nama_latihan','praktikums.id_praktikum','praktikums.nama_praktikum')
            ->get();
    }

    public static function getNilaiSpecific($id){
        return DB:: table('nilai')
            ->join('latihans','latihans.id_latihan','=','nilai.latihan_id')
            ->join('praktikans','praktikans.id_praktikan','=','nilai.praktikan_id')
            ->join('praktikums','praktikums.id_praktikum','=','nilai.praktikum_id')
            ->select('nilai.*','praktikans.npm','praktikans.nama_praktikan','latihans.nama_latihan','praktikums.id_praktikum','praktikums.nama_praktikum')
            ->where('id_nilai','=',$id)
            ->get();
    }
}