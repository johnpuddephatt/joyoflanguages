<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class PodcastsPageTemplate
{
    public static function name(): string
    {
        return "podcasts-page";
    }

    public static function label(): string
    {
        return "Podcasts page";
    }

    public static function unique(): bool
    {
        return false;
    }

    // Fields displayed in CMS
    public function fields(Request $request): array
    {
        return [];
    }

    // Resolve data for serialization
    public function resolve($page)
    {
        $page->content->podcasts = \App\Models\Podcast::all();
        return $page->content;
    }
}
