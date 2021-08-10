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

    public function get($count)
    {
        $page = request()->get('page') ? request()->get('page') : 1;
        return \Cache::tags(['articles'])->remember('articles_page_'.$page, 3600, function () use ($count) {
            return Article::with('tags')
                ->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'))
                ->orderBy('published_at', 'desc')
                ->paginate($count);
        });
    }

    public function getLast($count)
    {
        return \Cache::tags(['articles'])->remember('index_articles', 3600, function () use ($count) {
            return Article::with('tags')
                ->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'))
                ->orderBy('published_at', 'desc')
                ->take($count)
                ->get();
        });
    }

    public function getArticle($slug)
    {
        return \Cache::tags(['articles'])->remember('article_'.$slug, 3600, function () use ($slug) {
            return Article::where('slug', $slug)->first();
        });
    }

    public function delete($slug)
    {
        $article = Article::findOrFail($slug);
        $article->tags()->sync([]);
        return $article->delete();
    }

    public function save(FormRequest $request, $slug)
    {
        $article = Article::findOrFail($slug);
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
