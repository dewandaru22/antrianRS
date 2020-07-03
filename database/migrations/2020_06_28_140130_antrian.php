<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Antrian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('head')->unsigned()->nullable();
            $table->integer('tail')->unsigned()->nullable();
            $table->integer('dokter_id')->unsigned()->nullable();
            $table->foreign('head')->references('id')->on('periksa');
            $table->foreign('tail')->references('id')->on('periksa');
            $table->foreign('dokter_id')->references('id')->on('dokter');
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
        Schema::dropIfExists('antrian');
    }
}
