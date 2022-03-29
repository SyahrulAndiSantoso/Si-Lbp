<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class praktikan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++):
            DB::table('praktikans')->insert([
                'praktikum_id' =>$i,
                'npm' => "$i",
                'nama_praktikan' => "syahrul $i",
                'notelp' => '081803600258'.$i,
                'email' => 'syahrul'.$i.'@gmail.com',
            ]);
         endfor;
        
    }
}
