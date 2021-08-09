<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use \App\Http\Controllers\MainController;
use App\Models\Car;
use App\Models\Category;
use App\Models\Article;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

Breadcrumbs::for('salons', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Салоны', route('salons'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('catalog');
    $category = Category::where('slug', $slug)->first();
    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('category', $ancestor));
    }
    $trail->push($category->name, route('category', $category));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('catalog');
    $car = Car::find($id);
    foreach ($car->category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('category', $ancestor));
    }
    $trail->push($car->category->name, route('category', $car->category));
    $trail->push($car->name, route('product', $car));
});

Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Все новости', route('articles.index'));
});

Breadcrumbs::for('articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Добавление новости', route('articles.create'));
});

Breadcrumbs::for('articles.edit', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('home');
    $trail->push('Редактирование новости', route('articles.edit', $slug));
});

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Личный кабинет', route('dashboard'));
});

Breadcrumbs::for('articles.show', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('articles.index');
    $article = Article::where('slug', $slug)->first();
    $trail->push($article->title, route('articles.show', $article));
});

Breadcrumbs::for('page', function (BreadcrumbTrail $trail, $page) {
    $title = MainController::getPageTitle($page);
    $trail->parent('home');
    $trail->push($title, route('page', $page));
});
