<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface ArticlesRepositoryContract
{
    public function all($count);
    public function getLast($count);
    public function getArticle($slug);
    public function delete($slug);
    public function save(FormRequest $request, $slug);
    public function make(FormRequest $request);
    public function attachImage($image, $article);
}