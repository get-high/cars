<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Http\Requests\Image;
use App\Services\ImagesUploader;
use App\Services\TagsSynchronizer;
use App\Http\Requests\Article;
use App\Http\Requests\Tag;

class ArticleController extends Controller
{
    private $articlesRepository;

    public function __construct(ArticlesRepositoryContract $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    public function index()
    {
        $articles = $this->articlesRepository->get(5);
        return view('pages.news', compact('articles'));
    }

    public function create()
    {
        $this->authorize('admin', [self::class]);
        return view('pages.create');
    }

    public function store(Article $articleRequest, Tag $tagRequest, Image $imageRequest, TagsSynchronizer $synchronizer, ImagesUploader $imagesUploader)
    {
        $this->authorize('admin', [self::class]);
        $tags = $tagRequest->allTags();
        $article = $this->articlesRepository->make($articleRequest);
        $synchronizer->sync($tags, $article);
        if(!empty($imageRequest->image)) {
            $image = $imagesUploader->uploadStore($imageRequest);
            $this->articlesRepository->attachImage($image, $article);
        }
        return redirect()->route('articles.index')->with('success', 'Новость успешно добавлена');
    }

    public function show($slug)
    {
        $article = $this->articlesRepository->getArticle($slug);
        return view('pages.article', compact('article'));
    }

    public function edit($slug)
    {
        $this->authorize('admin', [self::class]);
        $article = $this->articlesRepository->getArticle($slug);
        return view('pages.edit', compact('article'));
    }

    public function update($slug, Article $articleRequest, Tag $tagRequest, Image $imageRequest, TagsSynchronizer $synchronizer, ImagesUploader $imagesUploader)
    {
        $this->authorize('admin', [self::class]);
        $tags = $tagRequest->allTags();
        $article = $this->articlesRepository->save($articleRequest, $slug);
        $synchronizer->sync($tags, $article);
        if(!empty($imageRequest->image)) {
            $image = $imagesUploader->uploadStore($imageRequest);
            $this->articlesRepository->attachImage($image, $article);
        }
        return redirect()->route('articles.index')->with('success', 'Новость успешно сохранена');
    }

    public function destroy($slug)
    {
        $this->authorize('admin', [self::class]);
        $this->articlesRepository->delete($slug);
        return redirect()->route('articles.index')->with('success', 'Новость успешно удалена');
    }
}
