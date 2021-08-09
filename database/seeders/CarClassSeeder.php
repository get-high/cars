<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
