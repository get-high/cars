<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\SalonsRepository;
use App\Services\SalonsClientService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SalonsClientService::class, function () {
            return new SalonsClientService(config('salon.login'), config('salon.password'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SalonsRepository $salonsRepository)
    {
        Blade::if('admin', function() {
            return (auth()->check() && auth()->user()->isAdmin());
        });

        Paginator::defaultView('vendor.pagination.catalog');

        view()->composer('components.panels.menu', function($view) {
            $view->with('categories', Category::orderBy('sort', 'asc')->get());
        });

        view()->composer('components.panels.footer', function($view) use ($salonsRepository) {
            $view->with('salons', $salonsRepository->getTwo());
        });
    }
}