<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MyFlexibleCast;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope("published_at", function (Builder $builder) {
            $builder
                ->whereNotNull("published_at")
                ->orderBy("published_at", "desc");
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "author_id",
        "title",
        "slug",
        "image",
        "introduction",
        "content",
        "published_at",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "author_id" => "integer",
        "published_at" => "timestamp",
        "image" => \App\Casts\NovaMediaLibraryCast::class,
        "content" => MyFlexibleCast::class,
        "published_at" => "date",
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route("post.show", ["post" => $this->slug]);
    }
}
