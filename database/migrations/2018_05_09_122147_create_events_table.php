<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->dateTime('datetime');
            $table->unsignedInteger('choir_id');
            $table->unsignedInteger('image_url')->nullable();
            $table->unsignedInteger('creator_id')->nullable();

            $table->foreign('choir_id')
                ->references('id')->on('choirs');
            $table->foreign('creator_id')
                ->references('id')->on('users');
            $table->foreign('image_url')
                ->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
