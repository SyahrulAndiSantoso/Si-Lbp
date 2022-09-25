<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class praktikum extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('praktikums')->insert([
            'id_praktikum' => 1,
            'nama_praktikum' => "Pemrograman Terstruktur",
            'deskripsi' => "panduan Pemrograman Terstruktur",
            'gambar' => "/image-storage/GfuGSkwZbUJjlQ2Tmq6GocYOXohwW95fPWOwWXXe.png"
        ]);
        DB::table('praktikums')->insert([
            'id_praktikum' => 2,
            'nama_praktikum' => "Struktur Data",
            'deskripsi' => "panduan Struktur Data",
            'gambar' => "/image-storage/kApdvI6uP2Vij6P0w3toqXQ39XFLRpFWMKa07Uk9.png"
        ]);
    }
}