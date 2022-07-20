<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRekam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rekam')) {
            Schema::create('rekam', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('kode_rekam');

                $table->text('id_poli');
                $table->text('id_pasien');
                $table->text('id_dokter');

                $table->text('kartu_berobat')->nullable();

                $table->dateTime('tanggal')->nullable();
                $table->text('diagnosa')->nullable();
                $table->text('pengobatan')->nullable();//untuk obat
                $table->text('petugas')->nullable();
           
                $table->text('uang_diterima')->nullable();
                $table->dateTime('tanggal_keluar')->nullable();
                $table->text('status_rujuk')->nullable();
                $table->text('status')->nullable();
        
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('rekam');
    }
}
