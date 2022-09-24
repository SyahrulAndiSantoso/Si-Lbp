<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->bigIncrements('id_jawaban');
            $table->unsignedBigInteger('praktikan_id');
            // $table->unsignedBigInteger('praktikum_id');
            $table->unsignedBigInteger('latihan_id');
            $table->text('jawaban');
            $table->text('hasil')->nullable();
            // $table->text('soal');
            // $table->string('kisi_kisi');
            $table->timestamps();
            $table->foreign('praktikan_id')->references('id_praktikan')->on('praktikans')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('praktikum_id')->references('id_praktikum')->on('praktikums')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('latihan_id')->references('id_latihan')->on('latihans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}