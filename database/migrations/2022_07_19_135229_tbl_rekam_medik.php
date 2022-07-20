<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRekamMedik extends Migration
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
                $table->text('kode_rm');

                $table->text('id_diagnosa')->nullable();
                $table->text('tindakan')->nullable();
                $table->text('dokter')->nullable();

                $table->dateTime('tanggal')->nullable();
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
