<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Podcast extends Model
{
    use HasFactory;
    use \Spatie\Tags\HasTags;

    protected static function booted()
    {
        static::addGlobalScope("published", function (Builder $builder) {
            $builder
                ->where("published", true)
                ->where("published_at", "<=", now());
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
        "id",
        "guid",
        "title",
        "slug",
        "rss_content",
        "wordpress_content",
        "episode_number",
        "introduction",
        "content",
        "published_at",
        "published",
        "file",
        "duration",
        "synced",
        "language_id",
        "wp_id",
        "image_url",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "published_at" => "datetime",
        "episode_number" => "integer",
        "language_id" => "integer",
        "content" => "json",
        "published" => "boolean",
        "synced" => "boolean",
    ];

    public function getUrlAttribute()
    {
        if (!$this->language) return null;

        return route("language.podcast.show", [
            "podcast" => $this->slug,
            "language" => $this->language?->slug,
        ]);
    }

    public function getShortUrlAttribute()
    {
        if (!$this->language) return null;

        return route("language.page.show", [
            "page" => $this->episode_number,
            "language" => $this->language?->slug,
        ]);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
