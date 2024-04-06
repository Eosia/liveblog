<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function(Category $category){
            $category->slug = Str::slug($category->name);
        });
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function articles() : HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function likes() : HasManyThrough
    {
        return $this->hasManyThrough(Like::class, Article::class);
    }

    public function comments() : HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Article::class);
    }
}
