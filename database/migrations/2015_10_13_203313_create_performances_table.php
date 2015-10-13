<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('location');
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('performance_song', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('performance_id');
            $table->integer('song_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('performances');
        Schema::drop('performance_song');
    }
}
