<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->randomNumber(7, true);
        return [
            'name' => ucwords($this->faker->words(2, true)),
            'body' => $this->faker->text(500),
            'price' => $price,
            'old_price' => (rand(0,1) == 1) ? $price + $this->faker->randomNumber(5, true) : NULL,
            'salon' => ucfirst($this->faker->words(4, true)),
            'car_class_id' => CarClass::factory(),
            'kpp' => (rand(0,1) == 1) ? 'АКПП' : 'МКПП',
            'year' => $this->faker->year(),
            'color' => $this->faker->colorName(),
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
            'is_new' => rand(0,1) == 1,
            'category_id' => Category::factory(),
            'image_id' => Image::factory(),
        ];
    }
}
