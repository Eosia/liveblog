<?php

namespace App\Models;

use App\Http\Traits\Resizeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    use Resizeable;

    protected $guarded = [];

    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
