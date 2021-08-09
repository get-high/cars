<?php

namespace App\Contracts;

interface BannersRepositoryContract
{
    public function getBanners($count);
}