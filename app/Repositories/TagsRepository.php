<?php

namespace App\Repositories;

use App\Contracts\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    public function sync($tags, $model)
    {
        $model->tags()->sync($tags->pluck('id'));
    }

    public function getTagOrMake($tag)
    {
        return Tag::firstOrCreate([
            'name' => trim($tag)
        ]);
    }
}