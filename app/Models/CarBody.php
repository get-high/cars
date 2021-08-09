<?php

namespace App\Models;

use Database\Factories\CarBodyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBody extends Model
{
    use HasFactory;

    protected $table = 'car_bodies';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CarBodyFactory::new();
    }
}
