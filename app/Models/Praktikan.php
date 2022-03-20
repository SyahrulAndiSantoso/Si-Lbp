<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_praktikan';
    protected $guarded = ['id_praktikan'];

    public function getAll()
    {
        return Praktikan::all();
    }

    public function create()
    {
        Praktikan::save();
    }

    public function hapus($id)
    {
        Praktikan::destroy($id);
    }
}
