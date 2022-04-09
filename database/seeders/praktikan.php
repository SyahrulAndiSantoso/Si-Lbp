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
        // for ($i = 1; $i <= 10; $i++) :
        //     DB::table('praktikans')->insert([
        //         'praktikum_id' => rand(1, 2),
        //         'npm' => "$i",
        //         'password' => bcrypt('12345') . $i,
        //         'nama_praktikan' => "syahrul $i",
        //         'notelp' => '081803600258' . $i,
        //         'email' => 'syahrul' . $i . '@gmail.com',
        //     ]);
        // endfor;

        DB::table('praktikans')->insert([
            'praktikum_id' => 1,
            'npm' => "1",
            'password' => bcrypt('12345'),
            'nama_praktikan' => "syahrul",
            'notelp' => '081803600258',
            'email' => 'syahrul@gmail.com',
        ]);
    }
}
