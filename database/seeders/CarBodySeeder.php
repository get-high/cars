<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
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
    }
}
