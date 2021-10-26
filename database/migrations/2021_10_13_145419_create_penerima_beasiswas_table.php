<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaBeasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nim");
            $table->string("foto_pengenal");
            $table->string("fakultas");
            $table->string("jurusan");
            $table->date("tanggal_masuk")->nullable();
            $table->date("tanggal_keluar")->nullable();
            $table->string("no_hp");
            $table->string("angkatan");
            $table->string("pembina");
            $table->boolean("is_valid")->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
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
        Schema::dropIfExists('penerima_beasiswas');
    }
}
