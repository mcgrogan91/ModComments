<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanEvaderIpRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban_evader_ip_ranges', function($table) {
            $table->increments('id');
            $table->integer('ban_evader_id');
            $table->foreign('ban_evader_id')->references('id')->on('ban_evaders');
            $table->integer('first_address');
            $table->integer('last_address');
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
        Schema::drop('ban_evader_ip_ranges');
    }
}
