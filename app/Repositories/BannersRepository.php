<?php

namespace App\Repositories;

use App\Contracts\BannersRepositoryContract;
use App\Models\Banner;

class BannersRepository implements BannersRepositoryContract
{
    public function get($count)
    {
        return \Cache::tags(['banners'])->remember('index_banners', 3600, function () use ($count) {
            return Banner::take($count)->inRandomOrder()->get();
        });
    }
}