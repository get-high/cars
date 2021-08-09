<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Events\ArticleEdited;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;
use Carbon\Carbon;

class ArticlesRepository implements ArticlesRepositoryContract
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function all($count)
    {
        return Article::with('tags')
            ->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'))
            ->orderBy('published_at', 'desc')
            ->paginate($count);
    }

    public function getLast($count)
    {
        return Article::with('tags')
            ->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'))
            ->orderBy('published_at', 'desc')
            ->take($count)
            ->get();
    }

    public function getArticle($slug)
    {
        return Article::where('slug', $slug)->first();
    }

    public function delete($slug)
    {
        $article = $this->getArticle($slug);
        $article->tags()->sync([]);
        return $article->delete();
    }

    public function save(FormRequest $request, $slug)
    {
        $article = $this->getArticle($slug);
        $article->update($request->validated());
        ArticleEdited::dispatch($article);
        return $article;
    }

    public function make(FormRequest $request)
    {
        return Article::create($request->validated());
    }

    public function attachImage($image, $article)
    {
        $article['image_id'] = isset($image->id) ? $image->id : null;
        return $article->save();
    }
}
