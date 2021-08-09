<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarBody::factory()
            ->count(7)
            ->state(new Sequence(
                ['name' => 'Седан'],
                ['name' => 'Хэтчбек'],
                ['name' => 'Универсал'],
                ['name' => 'Кабриолет'],
                ['name' => 'Пикап'],
                ['name' => 'Купе'],
                ['name' => 'Внедорожник'],
            ))
            ->create();

        CarClass::factory()
            ->count(7)
            ->state(new Sequence(
                ['name' => 'А-класс'],
                ['name' => 'B-класс'],
                ['name' => 'C-класс'],
                ['name' => 'D-класс'],
                ['name' => 'E-класс'],
                ['name' => 'F-класс'],
                ['name' => 'S-класс'],
            ))
            ->create();

        CarEngine::factory()
            ->count(4)
            ->state(new Sequence(
                ['name' => 'Бензин'],
                ['name' => 'Дизель'],
                ['name' => 'Гибрид'],
                ['name' => 'Электродвигатель'],
            ))
            ->create();

        Car::factory()
            ->count(20)
            ->state(new Sequence(function () {
                return ['car_engine_id' => CarEngine::all()->random()];
            }))
            ->state(new Sequence(function () {
                return ['car_body_id' => CarBody::all()->random()];
            }))
            ->state(new Sequence(function () {
                return ['car_class_id' => CarClass::all()->random()];
            }))
            ->create();
    }
}
