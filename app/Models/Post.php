<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use App\Casts\MyFlexibleCast;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use \Spatie\Tags\HasTags;

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
        "wp_id",
        "wordpress_content",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "author_id" => "integer",
        "language_id" => "integer",
        "published_at" => "timestamp",
        "image" => \App\Casts\NovaMediaLibraryCast::class,
        "content" => "json",
        "published_at" => "date",
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        if ($this->language && $this->language->is_active) {
            return route("language.post.show", [
                "post" => $this->slug,
                "language" => $this->language?->slug,
            ]);
        } else {
            return route("post.show", [
                "post" => $this->slug,
            ]);
        }
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function related_posts(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Post::class,
            "related_posts",
            "post_id",
            "related_id"
        );
    }

    // WARNING: Podcasts and Posts each have this function; @todo move to trait
    public function getWordpressContentAttribute($content)
    {
        // YouTube embeds
        $search =
            "/(?<!href=\")(?:http|https):\/\/(?:www.youtube\.com\/watch\?v=|youtu.be\/)([a-zA-Z0-9_&;-]+)/smi";
        $replace =
            "<iframe loading='lazy' class='w-full h-auto aspect-video' width='560' height='315' src='https://youtube.com/embed/$1' frameborder='0' allowfullscreen></iframe>";
        $content = preg_replace($search, $replace, $content);


        // Vimeo embeds
        $search =
            "/(?<!href=\")(?:http|https):\/\/(?:www\.)?vimeo\.com\/([a-zA-Z0-9_&;-]+)\/([a-zA-Z0-9_&;-]+)/smi";
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
}
