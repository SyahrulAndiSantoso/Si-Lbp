<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class latihan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++):
            DB::table('latihans')->insert([
                'praktikum_id' =>$i,
                'materi_id' =>$i,
                'soal' => "soal $i",
                'jawaban' => 'hello world',
                'kisi_kisi' => 'for,if,array',
            ]);
         endfor;
        
    }
}
