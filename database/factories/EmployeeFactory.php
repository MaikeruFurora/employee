<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name'=>$faker->lastName.', '.$faker->firstName.' '.$faker->lastName,
        'position'=>$faker->randomElement($array = array ('Teacher I','Teacher II','Teacher III','Principal')),
        'dateEmployed'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'sex'=>$faker->randomElement($array = array ('Male','Female')),
        'dob'=>$faker->unique()->buildingNumber,
        'pob'=>$faker->unique()->buildingNumber ,
        'employeeNumber'=>$faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
        'station'=>$faker->unique()->buildingNumber,
        'civilStatus'=>$faker->randomElement($array = array ('Single','Widow','Separate','Married')),
    ];
});
