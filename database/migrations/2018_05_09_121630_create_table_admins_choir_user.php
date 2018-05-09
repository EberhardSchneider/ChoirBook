<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdminsChoirUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_choir_user', function($table) {
            $table->unsignedInteger('choir_id');
            $table->unsignedInteger('user_id');
            
            $table->foreign('choir_id')
                ->references('id')->on('choirs');
            $table->foreign('choir_id')
                ->references('id')->on('choirs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins_choir_user');
    }
}
