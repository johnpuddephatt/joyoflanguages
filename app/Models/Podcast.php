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

    // WARNING: Podcasts and Posts each have this function
    public function getWordpressContentAttribute($content)
    {
        // YouTube embeds
        $search =
            "/(?:http|https):\/\/(?:www.youtube\.com\/watch\?v=|youtu.be\/)([a-zA-Z0-9_&;-]+)/smi";
        $replace =
            "<iframe loading='lazy' class='w-full h-auto aspect-video' width='560' height='315' src='https://youtube.com/embed/$1' frameborder='0' allowfullscreen></iframe>";
        $content = preg_replace($search, $replace, $content);


        // Vimeo embeds
        $search =
            "/(?:http|https):\/\/(?:www\.)?vimeo\.com\/([a-zA-Z0-9_&;-]+)\/([a-zA-Z0-9_&;-]+)/smi";
        $replace =
            "<iframe loading='lazy' class='w-full h-auto aspect-video' width='560' height='315' src='https://player.vimeo.com/video/$1?h=$2' frameborder='0' allowfullscreen></iframe>";
        $content = preg_replace($search, $replace, $content);

        // Image links
        $search = "/(?:src=\")(?:http|https):\/\/joyoflanguages\.com(.*?)/smi";
        $replace =
            "src=\"https://joyoflanguages-legacymedia.ams3.digitaloceanspaces.com";

        $content = preg_replace($search, $replace, $content);

        // [captions]
        $search = "/\[(?:\/?)caption(.*?)\]/smi";
        $replace = "<br/><br>";

        $content = preg_replace($search, $replace, $content);

        return $content;
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
