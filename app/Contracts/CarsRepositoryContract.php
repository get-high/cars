<?php

namespace App\Contracts;

use App\Http\Requests\Car;
use Illuminate\Foundation\Http\FormRequest;

interface CarsRepositoryContract
{
    public function all($count);
    public function getCar($id);
    public function getNew($count);
    public function getCarsFromCategory($categories, $count);
    public function index();
    public function save(Car $request, $slug);
    public function make(Car $request);
    public function delete($id);
}