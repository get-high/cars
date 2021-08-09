<?php

namespace App\Repositories;

use App\Contracts\BannersRepositoryContract;
use App\Models\Banner;

class BannersRepository implements BannersRepositoryContract
{
    public function getBanners($count)
    {
        return Banner::take($count)->inRandomOrder()->get();
    }
}