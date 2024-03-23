<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    public static function boot() {
        parent::boot();
        static::creating(function (Article $article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function scopePublished(Builder $query) {
        $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopeSort($query, $sort, $direction) {
        return match($sort)  {
            'author' => $query->orderBy(User::select('name')
                ->whereHas('articles')
                ->whereColumn('id', 'articles.user_id')
                ->orderBy('name')
                ->take(1),
                $direction
            ),
            'categories' =>$query->orderBy(Category::select('name')
                ->whereColumn('id', 'articles.category_id')
                ->orderBy('name')
                ->take(1),
                $direction
            ),
            'date' =>$query->orderBy('created_at', $direction),
            default => $query->orderBy('created_at', 'desc'),
        };
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function photos() : HasMany {
        return $this->hasMany(Photo::class)->latest('id');
    }

    public function photo() : HasOne {
        return $this->hasOne(Photo::class)->latestOfMany();
    }

}
