<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        $dataCategory = [
            [
                'name' => 'Легковые', 'slug' => 'legkovye',
                'children' => [
                    ['name' => 'Седаны', 'slug' => 'sedany'],
                    ['name' => 'Хетчбеки', 'slug' => 'hetchback'],
                    ['name' => 'Универсалы', 'slug' => 'universaly'],
                    ['name' => 'Купе', 'slug' => 'kupe'],
                    ['name' => 'Родстеры', 'slug' => 'rodstery'],
                ],
            ],
            [
                'name' => 'Внедорожники', 'slug' => 'offroad',
                'children' => [
                    ['name' => 'Рамные', 'slug' => 'ramnye'],
                    ['name' => 'Пикапы', 'slug' => 'pickup'],
                    ['name' => 'Кроссоверы', 'slug' => 'crossover',
                        'children' => [
                            ['name' => 'Джипы', 'slug' => 'djeep'],
                        ],
                    ],
                ],
            ],
            [ 'name' => 'Раритетные', 'slug' => 'rare' ],
            [ 'name' => 'Распродажа', 'slug' => 'sale' ],
            [ 'name' => 'Новинки', 'slug' => 'new' ],
        ];

        Category::rebuildTree($dataCategory);

        $images = [
            'car_ceed.png', 'car_cerato.png', 'car_k5_1.png', 'car_k5_2.png',
            'car_k5_3.png', 'car_K5-half.png', 'car_k900.png', 'car_mohave_new.png',
            'car_new_stinger.png', 'car_rio_new.png', 'car_rio-x.png', 'car_seltos.png',
            'car_sorento_new.png', 'car_soul.png', 'car_sportage.png', 'car_xceed.png'
        ];

        for($i = 1;$i<=3;$i++) {
            $banner = Storage::putFile('images', new File('public/assets/pictures/test_banner_'.$i.'.jpg'));
            $image = Image::factory()
                ->count(1)
                ->create(['name' => $banner]);
            Banner::factory()
                ->count(1)
                ->create(['image_id' => $image[0]->id]);
        }

        foreach ($images as $image) {
            $banner = Storage::putFile('images', new File('public/assets/pictures/'.$image));
            Image::factory()
                ->count(1)
                ->create(['name' => $banner]);
        }

        Car::factory()
            ->count(280)
            ->hasAttached(
                Image::factory()->count(3)->create()
            )
            ->state(new Sequence(function () {
                return ['image_id' => Image::all()->random()];
            }))
            ->state(new Sequence(function () {
                return ['category_id' => Category::all()->random()];
            }))
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

        $tags1 = Tag::factory()
            ->count(3)
            ->create();
        $tags2 = Tag::factory()
            ->count(4)
            ->create();

        for($i = 0;$i<20;$i++) {
            Article::factory()
                ->count(1)
                ->state(new Sequence(function () {
                    return ['image_id' => Image::all()->random()];
                }))
                ->hasAttached($tags1[array_rand($tags1->toArray())])
                ->hasAttached($tags2[array_rand($tags2->toArray())])
                ->create();
        }
    }
}
