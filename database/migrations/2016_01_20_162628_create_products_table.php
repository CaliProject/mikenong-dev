<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->unsignedInteger('user_id')->nullable();
            $table->string('contact_name');
            $table->string('phone', 15);
            $table->string('cellphone', 15)->nullable();
            $table->string('email');
            $table->string('release_date',30);
            $table->string('address');
            $table->unsignedInteger('category_id');
            $table->string('pricing');
            $table->text('description');
            $table->enum('status', ['provide','demand']);
            $table->boolean('is_essential');
            $table->boolean('is_sticky');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
