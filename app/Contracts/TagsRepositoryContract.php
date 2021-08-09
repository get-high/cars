<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface TagsRepositoryContract
{
    public function sync(Collection $tags, HasTags $model);
    public function getTagOrMake($tag);
}