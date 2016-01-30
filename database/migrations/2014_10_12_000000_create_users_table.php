<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('role', ['individual','cooperative','administrator'])->default('individual');
            $table->string('real_name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('qq', 15)->nullable();
            $table->string('cellphone',12)->nullable();
            $table->string('coop_name', 50)->nullable();
            $table->string('taobao')->nullable();
            $table->string('coop_phone', 15)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
