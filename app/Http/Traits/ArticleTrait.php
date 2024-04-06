<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

trait ArticleTrait
{
    protected function getArticles(Builder $query) : LengthAwarePaginator
    {
        if(! in_array($this->direction, ['asc', 'desc'])){
            $this->direction = 'desc';
        }
        return $this->articleService
            ->getAll($query, $this->sort, $this->direction, $this->search)
            ->paginate(9);
    }
}
