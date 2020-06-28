<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
// Str::slug($this->title, "-") . random_int(2,1000)

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence(3);

    return [
        'title'            => $title, 
        'slug'             => Str::slug($title, "-") .'-'. random_int(2, 1000), 
        'description'      => $faker->text, 
        'publication_date' => $faker->dateTime,
        'user_id'          => factory('App\User')->create()->id
    ];
});
