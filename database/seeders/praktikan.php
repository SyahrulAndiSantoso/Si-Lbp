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
            'npm'          => "1",
            'password'     => bcrypt('1'),
            'nama_praktikan' => "syahrul",
            'notelp'       => '081803600258',
            'email'        => 'syahrul@gmail.com',
        ]);

        DB::table('praktikans')->insert([
            'npm'          => "2",
            'password'     => bcrypt('2'),
            'nama_praktikan' => "habib",
            'notelp'       => '081803600258',
            'email'        => 'habib@gmail.com',
        ]);
    }
}
