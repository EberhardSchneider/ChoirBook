<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('rehearsal_times')->nullable();
            $table->string('rehearsal_location')->nullable();
            $table->string('location_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('image_id')
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
        Schema::dropIfExists('choirs');
    }
}
