<?php

namespace App\Models;

use Database\Factories\CarEngineFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEngine extends Model
{
    use HasFactory;

    protected $table = 'car_engines';

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
        return CarEngineFactory::new();
    }
}
