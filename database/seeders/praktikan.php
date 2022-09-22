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
        DB::table('praktikans')->insert([
            'npm'          => "2",
            'password'     => bcrypt('2'),
            'nama_praktikan' => "habib",
            'notelp'       => '081803600258',
            'email'        => 'habib@gmail.com',
        ]);
    }
}