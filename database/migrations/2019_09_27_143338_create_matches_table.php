<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team_one')->unsigned();
            $table->bigInteger('team_two')->unsigned();
            $table->bigInteger('team_won')->unsigned();
            $table->foreign('team_one')->references('id')->on('teams');
            $table->foreign('team_two')->references('id')->on('teams');
            //$table->foreign('team_won')->references('id')->on('teams');
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
        Schema::dropIfExists('matches');
    }
}
