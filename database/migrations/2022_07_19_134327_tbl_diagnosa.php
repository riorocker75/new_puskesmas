<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDiagnosa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        if(!Schema::hasTable('diagnosa')) {
            Schema::create('diagnosa', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('kode_rekam')->nullable();
                $table->text('keluhan')->nullable();
                $table->text('telaah')->nullable();
                $table->text('rpt')->nullable();
                $table->text('rpo')->nullable();
                $table->text('alergi')->nullable();

                $table->text('td')->nullable();
                $table->text('pr')->nullable();
                $table->text('bb')->nullable();
                $table->text('lp')->nullable();
                $table->text('hr')->nullable();
                $table->text('t')->nullable();
                $table->text('tb')->nullable();

                $table->text('assement')->nullable();
                $table->text('planing')->nullable();
                $table->text('education')->nullable();

                $table->text('terapi')->nullable();

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
        Schema::dropIfExists('diagnosa');
       
    }
}
