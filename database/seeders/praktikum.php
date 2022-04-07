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
                'nama_praktikum' =>"Pemrograman Terstruktur",
                'panduan' => "panduan Pemrograman Terstruktur",
            ]);
            DB::table('praktikums')->insert([
                'nama_praktikum' =>"Struktur Data",
                'panduan' => "panduan Struktur Data",
            ]);
  
        
    }
}
