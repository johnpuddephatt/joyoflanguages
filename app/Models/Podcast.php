<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MyFlexibleCast;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Podcast extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope("published_at", function (Builder $builder) {
            $builder->whereNotNull("published_at");
        });

        static::addGlobalScope("episode_number", function (Builder $builder) {
            $builder->orderBy("episode_number", "DESC");
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
        "episode_number",
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
        "episode_number" => "integer",
        "content" => MyFlexibleCast::class,
        "published_at" => "date",
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route("podcast.show", ["podcast" => $this->slug]);
    }
}
