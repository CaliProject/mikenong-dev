<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannerImages extends Migration
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
            ["key" => "banner.image.1", "value" => url('images/banner1.jpg') . '|baidu.com'],
            ["key" => "banner.image.2", "value" => url('images/banner2.jpg') . '|baidu.com'],
            ["key" => "banner.image.3", "value" => url('images/banner3.jpg') . '|baidu.com'],
            ["key" => "banner.image.4", "value" => url('images/banner4.jpg') . '|baidu.com'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
