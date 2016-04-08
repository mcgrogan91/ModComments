<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanEvaderProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban_evader_profiles', function($table) {
            $table->increments('id');
            $table->integer('ban_evader_id');
            $table->foreign('ban_evader_id')->references('id')->on('ban_evaders');
            $table->string('profile_id');
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
        Schema::drop('ban_evader_profiles');
    }
}
