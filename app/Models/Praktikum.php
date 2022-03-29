<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_praktikum';
    protected $guarded = ['id_praktikum'];

    public function praktikan(){
        return $this->hasMany(praktikan::class,'praktikum_id','id_praktikum');
    }

    public function latihan(){
        return $this->belongsTo(latihan::class,'praktikum_id','id_praktikum');
    }

    public function materi(){
        return $this->belongsTo(materi::class,'praktikum_id','id_praktikum');
    }

    public function panduan()
    {
        return $this->belongsTo(Panduan::class);
    }
}
