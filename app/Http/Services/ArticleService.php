<?php

namespace App\Http\Services;

use Illuminate\Contracts\Database\Eloquent\Builder;

class ArticleService
{
    public function getAll(Builder $query, $sort = null, $direction = null, $search = null)
    {
        $query->with(['user.avatar', 'photo', 'photos', 'category']);
        $query->unless($sort, function(Builder $query){
            $query->latest();
        });
        $query->when($sort, fn($query, $sort) => $query->sort($sort, $direction));
        $query->when($search, fn($query, $search) => $query->search($search));
        // $query->withCount(['likes']);
        $query->withCount(['likes', 'likes as liked' => function($query){
            $query->where('user_id', auth()->id());
        }])
            ->withCasts(['liked' => 'boolean']);

        return $query;
    }
}
