<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->e164PhoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'role' => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Addon::class, function (Faker\Generator $faker) {

    return [
        'dorm_id' => App\User::all()->random()->id,
        'add_item' => $faker->word,
        'add_price' => $faker->numberBetween($min = 100, $max = 1000),
    ];
});

$factory->define(App\Dorm::class, function(Faker\Generator $faker){
	return [
		'dormName' => $faker->company,
		'user_id' => App\User::all()->random()->id,
		'housingType' => $faker->randomElement(['apartment', 'boardinghouse', 'bedspace', 'dormitory']),
		'location' => $faker->randomElement(['banwa', 'dormArea']),
		'thumbnailPic' => '/img-uploads/no_image.png',
		'votes' => $faker->numberBetween($min = 0, $max = 30),
		'streetName' => $faker->streetName,
		'barangayName' => $faker->city,
	];
});

$factory->define(App\Facility::class, function(Faker\Generator $faker){
	return [
		'dorm_id' => App\Dorm::all()->random()->id,
		'facility_name' => $faker->word,
	];
});

$factory->define(App\Room::class, function(Faker\Generator $faker){
	return [
		'dorm_id' => App\Dorm::all()->random()->id,
		'maxNoOfResidents' => $faker->numberBetween($min = 2, $max = 8),
		'typeOfPayment' => $faker->randomElement(['by_person', 'by_room']),
		'price' => $faker->numberBetween($min = 800, $max = 5000),
		'availability' => $faker->numberBetween($min = 0, $max = 2)
	];
});

$factory->define(App\RequestDorm::class, function(Faker\Generator $faker){
	return [
		'user_id' => App\User::all()->random()->id,
		'dormName' => $faker->company,
		'housingType' => $faker->randomElement(['apartment', 'boardinghouse', 'bedspace', 'dormitory']),
		'location' => $faker->randomElement(['banwa', 'dormArea']),
		'thumbnailPic' => '/img-uploads/no_image.png',
		'streetName' => $faker->streetName,
		'barangayName' => $faker->city,
	];
});

$factory->define(App\RequestAddon::class, function(Faker\Generator $faker){
	return [
		'request_id' => App\RequestDorm::all()->random()->id,
		'add_item' => $faker->word,
		'add_price' => $faker->numberBetween($min = 100, $max = 1000),
	];
});

$factory->define(App\RequestFacility::class, function(Faker\Generator $faker){
	return [
		'request_id' => App\RequestDorm::all()->random()->id,
		'facility_name' => $faker->word,
	];
});

$factory->define(App\RequestRoom::class, function(Faker\Generator $faker){
	return [
		'request_id' => App\RequestDorm::all()->random()->id,
		'maxNoOfResidents' => $faker->numberBetween($min = 2, $max = 8),
		'typeOfPayment' => $faker->randomElement(['by_person', 'by_room']),
		'price' => $faker->numberBetween($min = 800, $max = 5000),
	];
});
