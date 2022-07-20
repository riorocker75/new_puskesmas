<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblKwitansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('kwitansi')) {
            Schema::create('kwitansi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('id_rekam');
                $table->text('kartu_berobat')->nullable();
                $table->text('ket')->nullable();
                $table->text('jumlah')->nullable();
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
