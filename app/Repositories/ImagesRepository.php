<?php

namespace App\Repositories;

use App\Contracts\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    public function upload($request) {
        return ($request->hasFile('image') and $request->file('image')->isValid()) ? $request->file('image')->store('images') : null;
    }

    public function store($name) {
        return $name ? Image::create(['name' => $name]) : null;
    }
}