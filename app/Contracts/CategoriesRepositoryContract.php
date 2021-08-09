<?php

namespace App\Contracts;

interface CategoriesRepositoryContract
{
    public function getCategory($slug);
}