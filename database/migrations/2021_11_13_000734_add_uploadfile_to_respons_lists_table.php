<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUploadfileToResponsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respons_lists', function (Blueprint $table) {
            $table->string("uploadfile")->default("kosong");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respons_lists', function (Blueprint $table) {
            $table->dropColumn("uploadfile");
        });
    }
}
