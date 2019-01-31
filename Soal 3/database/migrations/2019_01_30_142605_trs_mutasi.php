<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrsMutasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trs_mutasi', function (Blueprint $table) {
            $table->increments('mutasi_id');
            $table->integer('user_id')->unsigned();
            $table->string('mutasi_code')->default('');
            $table->datetime('mutasi_date')->nullable();
            $table->tinyInteger('mutasi_flag')->default(0);
            $table->tinyInteger('mutasi_status')->default(0);
            $table->double('mutasi_jumlah')->default(0);
            $table->double('mutasi_saldo')->default(0);
            $table->string('tujuan')->default('');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('ms_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
