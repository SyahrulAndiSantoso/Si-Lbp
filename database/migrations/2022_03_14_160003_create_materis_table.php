<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->bigIncrements('id_materi');
            $table->unsignedBigInteger('praktikum_id');
            $table->string('nama_materi',100);
            $table->text('isi_materi');
            $table->timestamps();
            $table->foreign('praktikum_id')->references('id_praktikum')->on('praktikums')->onDelete('cascade')->cascadeOnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materis');
    }
}
