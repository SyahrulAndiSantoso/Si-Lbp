<?php

namespace Database\Seeders;

use App\Models\Materi;
use Database\Seeders\materi as SeedersMateri;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            praktikum::class,
            praktikan::class,
            SeedersMateri::class,
            latihan::class,
            admin::class,
        ]);
    }
}
