<?php

namespace App\Service;

use App\Contracts\StatisticsRepositoryContract;

class StatisticsBuilder
{
    private $statisticsRepository;

    public function __construct(StatisticsRepositoryContract $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function getTotalCars() {
        return $this->statisticsRepository->totalCars();
    }

    public function getTotalArticles() {
        return $this->statisticsRepository->totalArticles();
    }

    public function getPopTag() {
        $tag = $this->statisticsRepository->getMostPopularTag();
        return $tag->name." (исп. ".$tag->articles_count." раз)";
    }

    public function getMostBiggestArticle() {
        $article = $this->statisticsRepository->mostBiggestArticle();
        return $article->id." - ".$article->title." (длина ".$article->length.")";
    }

    public function getMostShortestArticle() {
        $article = $this->statisticsRepository->mostShortestArticle();
        return $article->id." - ".$article->title." (длина ".$article->length.")";
    }

    public function getMostTaggedArticle() {
        $article = $this->statisticsRepository->mostTaggedArticle();
        return $article->id." - ".$article->title." (тегов ".$article->tags_count.")";
    }

    public function getAvg() {
        return $this->statisticsRepository->avg();
    }
}