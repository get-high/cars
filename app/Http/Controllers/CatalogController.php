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
        $cars = $this->carsRepository->all(16);
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
        $categories = $category->descendants()->withDepth()->having('depth', '<=', 1)->pluck('id');
        $categories[] = $category->getKey();
        $cars = $this->carsRepository->getCarsFromCategory($categories, 12);
        return view('pages.catalog', compact('cars', 'category'));
    }
}
