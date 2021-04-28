<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTinjutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tinjuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tinjut')->constraint('temuan_tinjuts');
            $table->longText('uraian');
            $table->longText('keterangan')->nullable();
            $table->longText('catatan')->nullable();
            $table->foreignId('created_by')->constraint('users');
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
        Schema::dropIfExists('data_tinjuts');
    }
}
