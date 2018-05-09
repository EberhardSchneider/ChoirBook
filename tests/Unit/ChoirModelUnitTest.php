<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Choir;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_create_user()
    {
        $data = [
            'name' => 'Eberhard Schneiders Holstein Singers',
            'description' => 'Wonderful choir.',
            'location_id' => null,
        ];

        $choir = new Choir;

        foreach ($data as $key => $row) {
            $choir->$key = $row;
        }

        $choir->save();

        $this->assertDatabaseHas('choirs', ['description' => 'Wonderful choir.']);

    }
}
