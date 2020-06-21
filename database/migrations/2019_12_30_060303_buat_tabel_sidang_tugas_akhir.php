<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelSidangTugasAkhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sidang_ta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ta');
            $table->string('dok_form_pengajuan_sidang_ta')->nullable();
            $table->string('dok_transkrip_nilai')->nullable();
            $table->string('dok_ket_lulus_praktikum')->nullable();
            $table->string('dok_pem_sidang_ta')->nullable();
            $table->string('dok_ket_bebas_ukt')->nullable();
            $table->string('dok_akta_lahir')->nullable();
            $table->string('dok_ijazah_sma')->nullable();
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
        Schema::dropIfExists('tbl_sidang_ta');
    }
}
