<?php

use Faker\Generator as Faker;

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        //
        'url'=>$faker->url,
        'title'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'description'=>$faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
