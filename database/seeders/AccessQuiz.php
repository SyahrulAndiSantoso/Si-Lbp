<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessQuiz extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5;$i++):
            DB::table('access_quiz')->insert([
                'praktikan_id' => rand(1,2),
                'praktikum_id' => rand(1,2),
                'materi_id' => 1,
            ]);
         endfor;
    }
}
