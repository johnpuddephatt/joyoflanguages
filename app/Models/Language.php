<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $casts = [
        "menus" => "array",
    ];

    public function pages()
    {
        return $this->hasMany(\App\Models\Page::class);
    }

    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function podcasts()
    {
        return $this->hasMany(\App\Models\Podcast::class);
    }

    public function getBlogLinkAttribute()
    {
        return \App\Models\Page::getTemplateUrl(
            \App\Nova\Templates\PostsPageTemplate::class,
            $this->id
        ) ??
            \App\Models\Page::getTemplateUrl(
                \App\Nova\Templates\PostsPageTemplate::class
            ) .
            "?lang=" .
            $this->slug;
    }

    public function getPodcastsLinkAttribute()
    {
        return \App\Models\Page::getTemplateUrl(
            \App\Nova\Templates\PodcastsPageTemplate::class,
            $this->id
        );
    }

    public function menu()
    {
        return $this->belongsTo(\Outl1ne\MenuBuilder\Models\Menu::class);
    }
}
