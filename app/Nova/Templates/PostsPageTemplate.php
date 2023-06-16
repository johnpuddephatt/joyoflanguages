<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class PostsPageTemplate
{
    public static function name(): string
    {
        return "posts-page";
    }

    public static function label(): string
    {
        return "Posts page";
    }

    public static function unique(): bool
    {
        return true;
    }

    // Fields displayed in CMS
    public function fields(Request $request): array
    {
        return [];
    }

    // Resolve data for serialization
    public function resolve($page)
    {
        $page->content->posts = \App\Models\Post::all();

        return $page->content;
    }
}
