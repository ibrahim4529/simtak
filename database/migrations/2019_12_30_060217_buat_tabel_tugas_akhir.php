<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelTugasAkhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tugas_akhir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->string('bidang_ta');
            $table->string('judul_ta');
            $table->enum('status', ['pengajuan', 'revisi', 'setujui', 'tinjau_ulang', 'tolak']);
            $table->unsignedBigInteger('id_pembimbing_1');
            $table->unsignedBigInteger('id_pembimbing_2');
            $table->string('dok_pem_bim_ta')->nullable();
            $table->string('dok_pem_buku_pedoman')->nullable();
            $table->string('dok_krs')->nullable();
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
        Schema::dropIfExists('tbl_tugas_akhir');
    }
}
