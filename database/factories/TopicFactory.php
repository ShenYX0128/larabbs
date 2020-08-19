<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    $updated_at = $faker->dateTimeThisMonth();//随机去一个月以内的时间
    $created_at = $faker->dateTimeThisMonth($updated_at);//生成最大不超过参数的时间

    return [
        // 'name' => $faker->name,
        'title' => $sentence,
        'body' => $faker->text(),
        'excerpt' => $sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
