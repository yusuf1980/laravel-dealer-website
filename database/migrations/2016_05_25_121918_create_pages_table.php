<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: use JSON data type for 'extras' instead of string
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template');
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            //$table->boolean('comments')->default(0);
            $table->text('content')->nullable();
            $table->text('extras')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
