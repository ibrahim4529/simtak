<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPresentasiKerjaPraktek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_presentasi_kp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kp');
            $table->string('no_hp');
            $table->string('dok_surat_selesai_kp')->nullable();
            $table->string('dok_laporan_kp')->nullable();
            $table->string('dok_pem_presentasi_kp')->nullable();
            $table->string('dok_krs')->nullable();
            $table->string('dok_laporan_kp_perusahaan')->nullable();
            $table->string('dok_nilai_pembimbing')->nullable();
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
        Schema::dropIfExists('tbl_presentasi_kp');
    }
}
