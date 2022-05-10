<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBAgreementToPenerimaBeasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penerima_beasiswas', function (Blueprint $table) {
            $table->string("BAgreement")->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penerima_beasiswas', function (Blueprint $table) {
            $table->dropColumn("BAgreement");
        });
    }
}
