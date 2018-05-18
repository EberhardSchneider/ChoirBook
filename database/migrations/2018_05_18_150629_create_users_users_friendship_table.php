<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersUsersFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_users_friendships', function (Blueprint $table) {
            $table->unsignedInteger('user1_id');
            $table->unsignedInteger('user2_id');
            $table->increments('id');
            $table->timestamps();

            $table->foreign('user1_id')
                ->references('id')->on('users');
            $table->foreign('user2_id')
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
        Schema::dropIfExists('users_users_friendship');
    }
}
