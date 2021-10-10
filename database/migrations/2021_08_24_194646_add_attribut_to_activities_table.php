<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('TA_id');
            $table->foreign('TA_id')->references('id')->on('type_activities')->onDelete("cascade");
            $table->unsignedBigInteger('devisi_id');
            $table->foreign('devisi_id')->references('id')->on('devisis')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign(["devisi_id"]);
            $table->dropColumn("devisi_id");
            $table->dropForeign(["TA_id"]);
            $table->dropColumn("TA_id");
        });
    }
}
