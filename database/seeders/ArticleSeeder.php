<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags1 = Tag::factory()
            ->count(3)
            ->create();
        $tags2 = Tag::factory()
            ->count(4)
            ->create();

        for($i = 0;$i<20;$i++) {
            Article::factory()
                ->count(1)
                ->hasAttached($tags1[array_rand($tags1->toArray())])
                ->hasAttached($tags2[array_rand($tags2->toArray())])
                ->create();
        }
    }
}
