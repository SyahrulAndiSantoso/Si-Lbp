<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    public function praktikum(){
        return $this->belongsTo(Praktikum::class,'praktikum_id','id_praktikum');
    }

    public function latihan(){
        return $this->hasOne(latihan::class,'materi_id','id_materi');
    }
}
