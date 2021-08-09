<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CarsRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car;

class CarController extends Controller
{
    private $carsRepository;

    public function __construct(CarsRepositoryContract $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function index()
    {
        try {
            $cars = $this->carsRepository->index();
            return response()->json([
                'success' => true,
                'cars' => $cars,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function store(Car $request)
    {
        try {
            $car = $this->carsRepository->make($request);
            return response()->json([
                'success' => true,
                'car_id' => $car->id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(Car $request, $id)
    {
        try {
            $this->carsRepository->save($request, $id);
            return response()->json([
                'success' => true,
                'car_id' => $id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->carsRepository->delete($id);
            return response()->json([
                'success' => true,
                'car_id' => $id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
