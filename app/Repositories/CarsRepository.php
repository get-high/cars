<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;

class CarsRepository implements CarsRepositoryContract
{
    public function getCatalog($count)
    {
        $page = request()->get('page') ? request()->get('page') : 1;
        return \Cache::tags(['cars'])->remember('catalog_page_'.$page, 3600, function () use ($count) {
            return Car::paginate($count);
        });
    }

    public function getCar($id)
    {
        return \Cache::tags(['cars'])->remember('car_'.$id, 3600, function () use ($id) {
            return Car::with('images')->findOrFail($id);
        });
    }

    public function getCategory($category, $count)
    {
        $page = request()->get('page') ? request()->get('page') : 1;
        $categories = $category->descendants()->withDepth()->having('depth', '<=', 1)->pluck('id');
        $categories[] = $category->getKey();
        return \Cache::tags(['cars'])->remember('catalog_category_'.$category->id.'_page_'.$page, 3600, function () use ($categories, $count) {
            return Car::whereIn('category_id', $categories)->paginate($count);
        });
    }

    public function getNew($count)
    {
        return \Cache::tags(['cars'])->remember('new_cars', 3600, function () use ($count) {
            return Car::where('is_new', 1)->take($count)->get();
        });
    }

    public function index()
    {
        return Car::select('name', 'body', 'price', 'old_price', 'car_body_id')->get();
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->images()->sync([]);
        return $car->delete();
    }

    public function save(FormRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->validated());
        return $car;
    }

    public function make(FormRequest $request)
    {
        return Car::create($request->validated());
    }
}
