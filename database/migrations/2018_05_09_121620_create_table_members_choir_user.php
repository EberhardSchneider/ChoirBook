<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMembersChoirUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_choir_user', function($table) {
            $table->unsignedInteger('choir_id');
            $table->unsignedInteger('user_id');
            
            $table->foreign('choir_id')
                ->references('id')->on('choirs');
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_choir_user');
    }
}
