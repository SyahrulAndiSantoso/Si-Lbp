<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikan extends Model
{
    use HasFactory;
    protected $table = "praktikans";
    protected $primaryKey = 'id_praktikan';
    protected $fillable = [
        'praktikum_id',
        'npm',
        'password',
        'nama_praktikan',
        'notelp',
        'email',
    ];

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id', 'id_praktikum');
    }


    // 
    // public function getAll()
    // {
    // return Praktikan::all();
    // }
    // 
    // public function create()
    // {
    // Praktikan::save();
    // }
    // 
    // public function hapus($id)
    // {
    // Praktikan::destroy($id);
    // }
    // 

}
