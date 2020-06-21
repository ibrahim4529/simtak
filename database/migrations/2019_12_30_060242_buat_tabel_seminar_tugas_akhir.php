<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelSeminarTugasAkhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_seminar_ta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ta');
            $table->string('dok_form_pengajuan_ta')->nullable();
            $table->string('dok_pem_seminar_ta')->nullable();
            $table->string('dok_laporan_ta')->nullable();
            $table->string('dok_krs')->nullable();
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
        Schema::dropIfExists('tbl_seminar_ta');
    }
}
