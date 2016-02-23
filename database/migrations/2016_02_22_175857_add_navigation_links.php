<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNavigationLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_conf', function (Blueprint $table) {

        });

        DB::table('site_conf')->insert([
            ["key" => "nav.link.6"],
            ["key" => "nav.link.7"],
            ["key" => "nav.link.8"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_conf', function (Blueprint $table) {
            //
        });
    }
}
