<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSidebarImage extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('site_conf')->insert([
            ['key' => 'sidebar.text', 'value' => ''],
            ['key' => 'sidebar.image', 'value' => ''],
            ['key' => 'news.image', 'value' => ''],
            ['key' => 'main.image', 'value' => ''],
            ['key' => 'logo', 'value' => '']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('site_conf')->where('key', 'sidebar.text')->delete();
        DB::table('site_conf')->where('key', 'sidebar.image')->delete();
        DB::table('site_conf')->where('key', 'news.image')->delete();
        DB::table('site_conf')->where('key', 'main.image')->delete();
        DB::table('site_conf')->where('key', 'logo')->delete();
    }
}
