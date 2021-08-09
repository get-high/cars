<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'url' => (rand(0,1) == 1) ? $this->faker->text(10) : null,
            'image_id' => Image::factory(),
        ];
    }
}
