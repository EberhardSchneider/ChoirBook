<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('tags')->insert([
            [ 'name' => 'Jazz' ],
            [ 'name' => 'Pop' ],
            [ 'name' => 'Gospel' ],
            [ 'name' => 'Geistlich' ],
            [ 'name' => 'Weltlich' ],
            [ 'name' => 'Renaissance' ],
            [ 'name' => 'Barock' ],
            [ 'name' => 'Neue Musik' ],
            [ 'name' => 'Romantik' ],
            [ 'name' => 'Klassik' ],
            [ 'name' => 'Moderne' ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
