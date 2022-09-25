<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class materi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=4;$i++):
            DB::table('materis')->insert([
                'praktikum_id' => 1,
                'nama_materi' => "Modul-$i",
                'isi_materi' => "<p> isi materi $i </p>",

            ]);
         endfor;

         for($i=1; $i<=4;$i++):
            DB::table('materis')->insert([
                'praktikum_id' => 2,
                'nama_materi' => "Modul-$i",
                'isi_materi' => "<p> isi materi $i </p>",

            ]);
         endfor;
        
    }
}
