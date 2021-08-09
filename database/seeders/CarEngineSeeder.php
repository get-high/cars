<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarEngine::factory()
            ->count(4)
            ->state(new Sequence(
                ['name' => 'Бензин'],
                ['name' => 'Дизель'],
                ['name' => 'Гибрид'],
                ['name' => 'Электродвигатель'],
            ))
            ->create();
    }
}
