<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_praktikum';
    protected $guarded = ['id_praktikum'];

    public function panduan()
    {
        return $this->belongsTo(Panduan::class);
    }
}
