<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('trackable_id')->unsigned();
            $table->string('trackable_type');
            $table->integer('one_day_stats')->default(0);
            $table->integer('seven_days_stats')->default(0);
            $table->integer('thirty_days_stats')->default(0);
            $table->integer('all_time_stats')->default(0);
            $table->string('raw_stats',1000)->default('');
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
        Schema::dropIfExists('stats');
    }
}
