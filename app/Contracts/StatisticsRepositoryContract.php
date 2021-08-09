<?php

namespace App\Contracts;

interface StatisticsRepositoryContract
{
    public function totalCars();
    public function totalArticles();
    public function getMostPopularTag();
    public function mostBiggestArticle();
    public function mostShortestArticle();
    public function mostTaggedArticle();
    public function avg();
}