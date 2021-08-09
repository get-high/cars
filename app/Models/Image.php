<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
