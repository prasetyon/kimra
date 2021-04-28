<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkaraHukumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkara_hukums', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_perkara');
            $table->string('domisili')->nullable();
            $table->foreignId('type')->constraint('jenis_perkaras');
            $table->year('tahun_masuk')->nullable();
            $table->string('unit')->nullable();
            $table->string('nomor_surat_kuasa')->nullable();
            $table->string('khusus')->nullable();
            $table->string('wilayah')->nullable();
            $table->longText('pokok_perkara');
            $table->longText('objek_tuntutan')->nullable();
            $table->longText('objek_tuntutan_lainnya')->nullable();
            $table->string('pihak_memanggil')->nullable();
            $table->string('pihak_terpanggil')->nullable();
            $table->string('posisi_dja')->nullable();
            $table->foreignId('user')->constraint('users');
            $table->boolean('approved')->default(false);
            $table->boolean('approved_es4')->default(false);
            $table->boolean('approved_es3')->default(false);
            $table->boolean('approved_es2')->default(false);
            $table->boolean('finished')->default(false);
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
        Schema::dropIfExists('perkara_hukums');
    }
}
