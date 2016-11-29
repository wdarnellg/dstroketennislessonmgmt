<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursusedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoursused', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessonhours_id')->unsigned();
            $table->datetime('date_time');
            $table->float('numberofhours');
            $table->text('comments');
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
        Schema::drop('hoursused');
    }
}
