<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPenerimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_penerimas', function (Blueprint $table) {
            $table->id();
            // status jabatan
            $table->string("status");
            $table->unsignedBigInteger('komsat_id');
            $table->foreign('komsat_id')->references('id')->on('komisats')->onDelete("cascade");
            $table->unsignedBigInteger('devisi_id');
            $table->foreign('devisi_id')->references('id')->on('devisis')->onDelete("cascade");
            $table->unsignedBigInteger('penerimaBeasiswa_id');
            $table->foreign('penerimaBeasiswa_id')->references('id')->on('penerima_beasiswas')->onDelete("cascade");
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
        Schema::dropIfExists('status_penerimas');
    }
}
