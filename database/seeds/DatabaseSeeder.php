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

        factory(App\User::class, 200)
            ->create()
            ->each(function($user) {
                factory(App\News::class, 1)->create(['user_id' => $user->id]);
            });

        factory(App\Choir::class, $nChoirs)->create()->each(function ($choir) {
            $choir->members()->attach(
                App\User::all()->random(rand(10,20))->pluck('id')->toArray()
            );
            $choir->admins()->attach(
                App\User::all()->random(rand(1,3))->pluck('id')->toArray()
            );
            factory(App\Event::class, rand(1,2))
                ->create(['choir_id' => $choir->id])
                ->each(function($event) use ($choir) {
                    $event->user_id_id = $choir->members()->get()->random(1)->pluck('id')[0];
                    $event->save();
                });

        });
    }
}
