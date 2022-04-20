<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccessQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('access_quiz', function (Blueprint $table) {
            $table->bigIncrements('idAccessQuiz');
            $table->unsignedBigInteger('praktikan_id');
            $table->unsignedBigInteger('praktikum_id');
            $table->unsignedBigInteger('materi_id');
            $table->timestamps();
            $table->foreign('praktikan_id')->references('id_praktikan')->on('praktikans')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
}
