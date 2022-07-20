<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRekamMedis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rekam_medis')) {
            Schema::create('rekam_medis', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('kode_rekam');
                $table->text('no_rm')->nullable();
                $table->dateTime('tanggal')->nullable();
                $table->text('diagnosa')->nullable();
                $table->text('dokter')->nullable();
                $table->text('tindakan')->nullable();
                $table->text('resep')->nullable();
           
                $table->dateTime('tanggal_keluar')->nullable();
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
        Schema::dropIfExists('rekam_medis');

    }
}
