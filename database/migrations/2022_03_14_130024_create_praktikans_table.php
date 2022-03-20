<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraktikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktikans', function (Blueprint $table) {
            $table->id('id_praktikan');
            $table->string('nama_praktikan', 100);
            $table->string('notelp', 20);
            $table->string('npm', 40);
            $table->string('email', 100)->unique();
            $table->foreignId('kode_praktikum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praktikans');
    }
}
