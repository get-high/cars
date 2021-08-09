<?php

namespace App\Models;

use Database\Factories\CarClassFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarClass extends Model
{
    use HasFactory;

    protected $table = 'car_classes';

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
        return CarClassFactory::new();
    }
}
