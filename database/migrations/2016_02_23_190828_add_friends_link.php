<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFriendsLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 1; $i <= 20; $i++)
            DB::table('site_conf')->insert(["key" => "footer.link.{$i}"]);
        DB::table('site_conf')->insert([
            ["key" => "qrcodes.1"],
            ["key" => "sidebar.images.1"],
            ["key" => "sidebar.images.2"],
            ["key" => "sidebar.images.3"]
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
