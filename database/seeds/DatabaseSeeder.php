<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $nChoirs = 10;

        factory(App\Choir::class, $nChoirs)->create()->each(function ($c) {
            
        });
    }
}
