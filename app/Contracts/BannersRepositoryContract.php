<?php

namespace App\Contracts;

interface BannersRepositoryContract
{
    public function get($count);
}