<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelYudisium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_yudisium', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->string('judul_laporan');
            $table->string('dok_form_pengajuan_yudisium')->nullable();
            $table->string('dok_cv')->nullable();
            $table->string('dok_ket_bebas_keuangan')->nullable();
            $table->string('dok_ket_bebas_pustaka_prodi')->nullable();
            $table->string('dok_ket_bebas_pustaka')->nullable();
            $table->string('dok_ket_bebas_lab')->nullable();
            $table->string('dok_ket_bebas_revisi')->nullable();
            $table->enum('status', ['pengajuan', 'revisi', 'setujui', 'tinjau_ulang', 'tolak']);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('tbl_yudisium');
    }
}
