<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'name'=>$faker->title,
        'length'=>(string)$faker->time("H:i"),
        'date'=>(string)$faker->date('Y-m-d'),
        'rating'=>$faker->randomFloat(2,1,10),
        'desc'=>$faker->text,
        'director_id'=>function(){
                return factory('App\Director')->create()->id;
            },
        'writer_id' => function(){
            return factory('App\Writer')->create()->id;
        },
        'image_url'=>$faker->imageUrl()
    ];
});


$factory->define(App\Director::class, function (Faker $faker) {
    return [
        'name'=>$faker->title,
        'bio'=>$faker->text,
        'birth_date'=>(string)$faker->date('Y-m-d'),
        'location'=>$faker->streetAddress
    ];
});

$factory->define(App\Actor::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'bio'=>$faker->text,
        'birth_date'=>(string)$faker->date('Y-m-d'),
        'location'=>$faker->streetAddress
    ];
});

$factory->define(App\Writer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'bio'=>$faker->text,
        'birth_date'=>(string)$faker->date('Y-m-d'),
        'location'=>$faker->streetAddress
    ];
});

$factory->define(App\Actor_Movie::class, function (Faker $faker) {
    $actorId = App\Actor::pluck('id')->toArray();
    $movieId = App\Movie::pluck('id')->toArray();

    return [
        'actor_id'=>$faker->randomElement($actorId),
        'movie_id'=>$faker->randomElement($movieId)
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [

        'name'=>'naumps',
        'email'=>'naumpopstefanija@gmail.com',
        'password'=>bcrypt('naumps'),
        'role'=>'admin'

    ];
});





