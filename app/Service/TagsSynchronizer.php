<?php

namespace App\Service;

use App\Contracts\HasTags;
use App\Contracts\TagsRepositoryContract;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    private $tagsRepository;

    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function sync(Collection $tags, HasTags $model) {
        $this->tagsRepository->sync($tags, $model);
    }
}