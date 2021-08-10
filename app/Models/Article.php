<?php

namespace App\Models;

use App\Contracts\HasTags;
use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements HasTags
{
    use HasFactory, Sluggable;

    protected $table = 'articles';
    protected $fillable = ['title', 'slug', 'description', 'body', 'published_at', 'image_id'];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'deleted' => ArticleDeleted::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            \Cache::tags(['articles'])->flush();
        });

        static::updated(function () {
            \Cache::tags(['articles'])->flush();
        });

        static::deleted(function () {
            \Cache::tags(['articles'])->flush();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }
}
