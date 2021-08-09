<?php

namespace App\Repositories;

use App\Contracts\CategoriesRepositoryContract;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function getCategory($slug)
    {
        return Category::where('slug', $slug)->first();
    }
}