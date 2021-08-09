<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;

class CarsRepository implements CarsRepositoryContract
{
    public function all($count)
    {
        return Car::paginate($count);
    }

    public function getCar($id)
    {
        return Car::with('images')->findOrFail($id);
    }

    public function getCarsFromCategory($categories, $count)
    {
        return Car::whereIn('category_id', $categories)->paginate($count);
    }

    public function getNew($count)
    {
        return Car::where('is_new', 1)->take($count)->get();
    }

    public function index()
    {
        return Car::select('name', 'body', 'price', 'old_price', 'car_body_id')->get();
    }

    public function delete($id)
    {
        $car = $this->getCar($id);
        $car->images()->sync([]);
        return $car->delete();
    }

    public function save(FormRequest $request, $id)
    {
        $car = $this->getCar($id);
        $car->update($request->validated());
        return $car;
    }

    public function make(FormRequest $request)
    {
        return Car::create($request->validated());
    }
}
