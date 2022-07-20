<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('pasien')) {
            Schema::create('pasien', function (Blueprint $table) {
                $table->bigIncrements('id');
                 $table->text('nama');
                $table->text('nik')->nullable();
                $table->text('no_rm')->nullable();
                $table->text('gol_darah')->nullable();
                $table->text('jenis_kelamin')->nullable();
                $table->text('status_nikah')->nullable();
                $table->text('jkn')->nullable();
                $table->text('alergi_obat')->nullable();
                $table->text('alergi_makan')->nullable();
                $table->text('alergi_udara')->nullable();
                $table->text('alergi_lain')->nullable();

                $table->text('kartu_berobat')->nullable();
                $table->dateTime('tanggal_lahir')->nullable();
                $table->text('tempat_lahir')->nullable();
                $table->text('agama')->nullable();
                $table->text('pekerjaan')->nullable();
                $table->text('alamat')->nullable();
                $table->text('no_hp')->nullable();

                $table->text('nama_kepala')->nullable();
                $table->dateTime('tgl_registrasi')->nullable();

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
      Schema::dropIfExists('pasien');
    }
}
