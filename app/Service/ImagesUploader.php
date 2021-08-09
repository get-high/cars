<?php

namespace App\Service;

use App\Contracts\ImagesRepositoryContract;
use App\Http\Requests\Image;

class ImagesUploader
{
    private $imagesRepository;

    public function __construct(ImagesRepositoryContract $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    public function uploadStore(Image $request) {
        $img = $this->imagesRepository->upload($request);
        $image = $img ? $this->imagesRepository->store($img) : null;
        return $image;
    }
}