<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['time_ago'];

    public function timeAgo() : Attribute {
        return new Attribute(
            get: fn() => $this->created_at->diffForHumans(),
        );
    }

    public function article() : BelongsTo {
        return $this->belongsTo(Article::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }




}
