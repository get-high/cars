<?php

namespace App\Providers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannersRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoriesRepositoryContract;
use App\Contracts\ImagesRepositoryContract;
use App\Contracts\StatisticsRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\BannersRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\StatisticsRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ArticlesRepositoryContract::class,
            ArticlesRepository::class
        );
        $this->app->bind(
            CarsRepositoryContract::class,
            CarsRepository::class
        );
        $this->app->bind(
            TagsRepositoryContract::class,
            TagsRepository::class
        );
        $this->app->bind(
            ImagesRepositoryContract::class,
            ImagesRepository::class
        );
        $this->app->bind(
            BannersRepositoryContract::class,
            BannersRepository::class
        );
        $this->app->bind(
            CategoriesRepositoryContract::class,
            CategoriesRepository::class
        );
        $this->app->bind(
            StatisticsRepositoryContract::class,
            StatisticsRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
