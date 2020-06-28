<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_periksa');
            $table->integer('pasien_id')->unsigned()->nullable();;
            $table->integer('dokter_id')->unsigned()->nullable();;
            $table->integer('users_id')->unsigned()->nullable();;
            $table->date('tanggal');
            $table->string('status')->default('Menunggu');
            $table->integer('next');
            $table->integer('previous');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('cascade');
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
        Schema::dropIfExists('periksa');
    }
}
