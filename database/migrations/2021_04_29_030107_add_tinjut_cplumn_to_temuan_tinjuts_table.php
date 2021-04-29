<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTinjutCplumnToTemuanTinjutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temuan_tinjuts', function (Blueprint $table) {
            $table->longText('tinjut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temuan_tinjuts', function (Blueprint $table) {
            $table->dropColumn('tinjut');
        });
    }
}
