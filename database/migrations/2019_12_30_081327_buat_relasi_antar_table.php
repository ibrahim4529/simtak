<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatRelasiAntarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            $table->foreign('id_prodi')->references('id')->on('tbl_prodi')->onDelete('cascade');
            $table->foreign('id_level_user')->references('id')->on('tbl_level_user')->onDelete('cascade');
        });

        Schema::table('tbl_tugas_akhir', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('tbl_user')->onDelete('cascade');
            $table->foreign('id_pembimbing_1')->references('id')->on('tbl_user')->onDelete('cascade');
            $table->foreign('id_pembimbing_2')->references('id')->on('tbl_user')->onDelete('cascade');
        });
        Schema::table('tbl_seminar_ta', function (Blueprint $table) {
            $table->foreign('id_ta')->references('id')->on('tbl_tugas_akhir')->onDelete('cascade');
        });
        Schema::table('tbl_sidang_ta', function (Blueprint $table) {
            $table->foreign('id_ta')->references('id')->on('tbl_tugas_akhir')->onDelete('cascade');
        });
        Schema::table('tbl_kerja_praktek', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('tbl_user')->onDelete('cascade');
            $table->foreign('id_pembimbing')->references('id')->on('tbl_user')->onDelete('cascade');
        });
        Schema::table('tbl_presentasi_kp', function (Blueprint $table) {
            $table->foreign('id_kp')->references('id')->on('tbl_kerja_praktek')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            //
        });
    }
}
