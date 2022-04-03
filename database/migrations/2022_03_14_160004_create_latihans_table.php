<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latihans', function (Blueprint $table) {
            $table->bigIncrements('id_latihan');
            $table->unsignedBigInteger('praktikum_id');
            $table->unsignedBigInteger('materi_id');
            $table->text('soal');
            $table->string('jawaban');
            $table->string('kisi_kisi');
            $table->timestamps();
            $table->foreign('praktikum_id')->references('id_praktikum')->on('praktikums')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materi_id')->references('id_materi')->on('materis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('latihans');
    }
}
