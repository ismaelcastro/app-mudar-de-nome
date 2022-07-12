<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

require_once __DIR__ . '/../faker_data/document_number.php';

$factory->define(Client::class, function (Faker $faker) {
    $email_type = array_rand(array_keys(Client::TYPE_EMAIL),1);
    $type_enum = array_rand(array_keys(Client::TYPE_ENUM),1);
    
    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
    $password = substr($random, 0, 10);
    $passwordHash = Hash::make($password);

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'email_type' => $email_type[0],
        'type_enum' => $type_enum[0],
        'phone' => $faker->phoneNumber,
        'password' => $passwordHash
    ];
});
