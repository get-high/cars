<?php

namespace App\Http\Controllers;

use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoriesRepositoryContract;

class CatalogController extends Controller
{
    private $carsRepository;
    private $categoriesRepository;

    public function __construct(CarsRepositoryContract $carsRepository, CategoriesRepositoryContract $categoriesRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $cars = $this->carsRepository->getCatalog(16);
        return view('pages.catalog', compact('cars'));
    }

    public function product($id)
    {
        $car = $this->carsRepository->getCar($id);
        return view('pages.detail', compact('car'));
    }

    public function category($slug)
    {
        $category = $this->categoriesRepository->getCategory($slug);
        $cars = $this->carsRepository->getCategory($category, 12);
        return view('pages.catalog', compact('cars', 'category'));
    }
}
