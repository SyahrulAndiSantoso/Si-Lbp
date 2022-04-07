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
        for($i=1; $i<=10;$i++):
            DB::table('materis')->insert([
                'praktikum_id' =>rand(1,2),
                'nama_materi' => "coba materi $i",
                'isi_materi' => "<p> isi materi $i </p>",

            ]);
         endfor;
        
    }
}
