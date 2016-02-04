<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteConfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_conf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('site_conf')->insert([
            ['key' => 'site.name', 'value' => '米科农网'],
            ['key' => 'site.description', 'value' => ''],
            ['key' => 'site.keywords', 'value' => ''],
            ['key' => 'beian', 'value' => ''],
            ['key' => 'qq', 'value' => ''],
            ['key' => 'nav.link.1', 'value' => ''],
            ['key' => 'nav.link.2', 'value' => ''],
            ['key' => 'nav.link.3', 'value' => ''],
            ['key' => 'nav.link.4', 'value' => ''],
            ['key' => 'nav.link.5', 'value' => ''],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_conf');
    }
}
