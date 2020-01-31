<?php

use Illuminate\Database\Seeder;

class tweets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert(
            [
                'author' => Str::random(30),
                'content' => Str::random(144)
            ]
            );
    }
}
