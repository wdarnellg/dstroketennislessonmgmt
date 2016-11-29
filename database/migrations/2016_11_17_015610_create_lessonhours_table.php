<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonhours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('players_id')->unsigned();
            $table->integer('packages_id')->unsigned();
            $table->date('signup_date');
            $table->timestamps();
            
            $table->foreign('players_id')->references('id')->on('players');
            $table->foreign('packages_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lessonhours');
    }
}
