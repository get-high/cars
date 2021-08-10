<?php

namespace App\Contracts;

use App\Http\Requests\Car;

interface CarsRepositoryContract
{
    public function getCatalog($count);
    public function getCar($id);
    public function getNew($count);
    public function getCategory($category, $count);
    public function index();
    public function save(Car $request, $slug);
    public function make(Car $request);
    public function delete($id);
}