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
            $table->bigIncrements('id_praktikan');
            $table->unsignedBigInteger('praktikum_id')->nullable();
            $table->string('npm', 40)->unique();
            $table->string('password', 100);
            $table->string('nama_praktikan', 100);
            $table->string('notelp', 20);
            $table->string('email', 100)->unique();
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
        Schema::dropIfExists('praktikans');
    }
}
