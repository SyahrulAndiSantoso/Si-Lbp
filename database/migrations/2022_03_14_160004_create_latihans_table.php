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
            $table->text('nama_latihan');
            $table->text('soal');
            $table->string('time',255);
            $table->timestamps();
            $table->foreign('praktikum_id')->references('id_praktikum')->on('praktikums')->onDelete('cascade')->onUpdate('cascade');
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