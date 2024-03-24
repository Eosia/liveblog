<?php

namespace App\Http\Traits;


trait WithSorting
{
    protected function queryStringWithSorting()
    {
        return [
            'sort' => ['except' => ''],
            'direction' => ['except' => ''],
            'search' => ['except' => ''],
        ];
    }
}
