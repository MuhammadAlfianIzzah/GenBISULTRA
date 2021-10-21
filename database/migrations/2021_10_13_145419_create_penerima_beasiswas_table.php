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
            $table->date("tanggal_masuk");
            $table->date("tanggal_keluar");
            $table->string("no_hp");
            $table->string("angkatan");
            $table->string("pembina");
            $table->string("is_valid");
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
