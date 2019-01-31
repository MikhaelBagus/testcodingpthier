<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('role_id')->unsigned();
            $table->string('user_name')->default('');
            $table->string('user_full_name')->default('');
            $table->string('user_no_rekening')->default('');
            $table->string('user_password')->default('');
            $table->double('user_saldo')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('role_id')->references('role_id')->on('ms_role');
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
