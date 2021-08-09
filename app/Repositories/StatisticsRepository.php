<?php

namespace App\Repositories;

use App\Contracts\StatisticsRepositoryContract;
use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Carbon\Carbon;

class StatisticsRepository implements StatisticsRepositoryContract
{
    public function totalCars()
    {
        return Car::count();
    }

    public function totalArticles()
    {
        return Article::where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'))->count();
    }

    public function getMostPopularTag()
    {
        return Tag::select('name')->withCount('articles')->orderBy('articles_count', 'desc')->first();
    }

    public function mostBiggestArticle()
    {
        return Article::selectRaw('id, title, LENGTH(body) as length')->orderBy('length', 'desc')->first();
    }

    public function mostShortestArticle()
    {
        return Article::selectRaw('id, title, LENGTH(body) as length')->orderBy('length', 'asc')->first();
    }

    public function mostTaggedArticle()
    {
        return Article::select('id', 'title')->withCount('tags')->orderBy('tags_count', 'desc')->first();
    }

    public function avg()
    {
        $articles = $this->totalArticles();
        $allTagsWithNews = Tag::has('articles', '>', 0)->count();
        return $articles / $allTagsWithNews;
    }
}