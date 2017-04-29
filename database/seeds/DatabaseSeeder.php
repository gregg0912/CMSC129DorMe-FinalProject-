<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        factory(App\Post::class, 1000)->create();
        factory(App\Like::class, 1500)->create();
        factory(App\Followers::class, 200)->create();

    }
}
