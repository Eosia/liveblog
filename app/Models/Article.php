<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public  const STATUS_DRAFT = 'draft';
    public  const STATUS_PUBLISHED = 'published';

    public static function boot() {
        parent::boot();
        static::creating(function (Article $article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function user() : BelongsTo {
        return $this->belongTo(User::class);
    }

    public function photos() : HasMany {
        return $this->hasMany(Photo::class);
    }

    public function photo() : HasOne {
        return $this->hasOne(Photo::class)->latestOfMany();
    }

}
