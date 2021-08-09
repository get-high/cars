<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannersRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Repositories\SalonsRepository;

class MainController extends Controller
{
    private $carsRepository;
    private $articlesRepository;
    private $bannersRepository;
    private $salonsRepository;

    public function __construct(CarsRepositoryContract $carsRepository, ArticlesRepositoryContract $articlesRepository, BannersRepositoryContract $bannersRepository, SalonsRepository $salonsRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->articlesRepository = $articlesRepository;
        $this->bannersRepository = $bannersRepository;
        $this->salonsRepository = $salonsRepository;
    }

    public function index()
    {
        $newCars = $this->carsRepository->getNew(4);
        $articles = $this->articlesRepository->getLast(3);
        $banners = $this->bannersRepository->getBanners(3);
        return view('pages.homepage', compact('articles', 'newCars', 'banners'));
    }

    public function salons()
    {
        $allSalons = $this->salonsRepository->getAll()->object();
        return view('pages.salon', compact('allSalons'));
    }

    public function page($page)
    {
        $title = $this->getPageTitle($page);
        return view('pages.page', compact('title'));
    }

    public static function getPageTitle($slug) {
        return match ($slug) {
            'about' => 'О компании',
            'terms' => 'Условия продаж',
            'contact' => 'Контактная информация',
            'findep' => 'Финансовый отдел',
            'client' => 'Для клиентов',
            default => 'Страница не найдена',
        };
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
