<?php

namespace App\Contracts;

interface ImagesRepositoryContract
{
    public function upload($request);
    public function store($name);
}