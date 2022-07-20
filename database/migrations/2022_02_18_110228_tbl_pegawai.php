<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pegawai')) {
            Schema::create('pegawai', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nip');
                $table->text('nama');
                $table->text('jenis_kelamin')->nullable();
                $table->dateTime('tanggal_lahir')->nullable();
                $table->text('tempat_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->text('telepon')->nullable();
                $table->text('jabatan')->nullable();
                $table->text('pendidikan_nama')->nullable();
                $table->text('pendidikan_tahun_lulus')->nullable();
                $table->text('pendidikan_tk_ijazah')->nullable();
               $table->text('tmt_cpns')->nullable();
               $table->text('tanggal')->nullable();

               $table->text('status')->comment('1=aktif, 0=non')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}
