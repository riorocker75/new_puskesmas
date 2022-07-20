<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('dokter')) {
           Schema::create('dokter', function (Blueprint $table) {
               $table->bigIncrements('id');
                 $table->text('nip');
                $table->text('nama');
                $table->text('jenis_kelamin')->nullable();
                $table->dateTime('tanggal_lahir')->nullable();
                $table->text('tempat_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->text('telepon')->nullable();
                $table->text('tanggal')->nullable();
                $table->text('poli')->nullable();
                $table->text('status')->nullable();


           });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('dokter');
    }
}
