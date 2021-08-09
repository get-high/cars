<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(50);
        $slug = Str::of($title)->slug('-');
        return [
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->text(255),
            'body' => $this->faker->paragraph(10),
            'published_at' => $this->faker->dateTimeInInterval('-4 week', '+4 week'),
            'image_id' => Image::factory(),
        ];
    }
}
