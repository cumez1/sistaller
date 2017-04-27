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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(12345),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'nit' => rand(12345, 54321),
        'apellido' => $faker->lastName,
        'direccion' => $faker->streetAddress,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'telefono' => $faker->phoneNumber,        
        'activo' => 1,   
    ];
});
