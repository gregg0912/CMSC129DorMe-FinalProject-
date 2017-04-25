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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Dorm::class, 20)->create();
        factory(App\Addon::class, 25)->create();
        factory(App\Facility::class, 30)->create();
        factory(App\Room::class, 50)->create();
        factory(App\Request::class, 15)->create();
        factory(App\RequestAddon::class, 20)->create();
        factory(App\RequestFacility::class, 20)->create();
        factory(App\RequestRoom::class, 40)->create();
    }
}
