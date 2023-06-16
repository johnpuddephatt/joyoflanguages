<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class SectionedPageTemplate
{
    public static function name(): string
    {
        return "sectioned-page";
    }

    public static function label(): string
    {
        return "Sectioned page";
    }

    public static function unique(): bool
    {
        return false;
    }

    // Fields displayed in CMS
    public function fields(Request $request): array
    {
        return [
            Flexible::make("Sections", "content")
                ->addLayout(\App\Nova\Flexible\Layouts\PageHero::class)
                ->addLayout(\App\Nova\Flexible\Layouts\PageIntroduction::class)
                ->addLayout(\App\Nova\Flexible\Layouts\Section::class)
                ->addLayout(\App\Nova\Flexible\Layouts\Quote::class)
                ->addLayout(\App\Nova\Flexible\Layouts\Text::class)
                ->addLayout(\App\Nova\Flexible\Layouts\TextWithImage::class)
                ->addLayout(\App\Nova\Flexible\Layouts\PodcastLink::class)
                ->addLayout(\App\Nova\Flexible\Layouts\BlogLink::class)
                ->addLayout(\App\Nova\Flexible\Layouts\FeatureBlock::class)
                ->addLayout(\App\Nova\Flexible\Layouts\Publication::class)
                ->button("Add section")
                ->enablePreview(
                    \Illuminate\Support\Facades\Vite::asset(
                        "resources/css/app.css"
                    )
                ),
        ];
    }

    // Resolve data for serialization
    public function resolve($page)
    {
        return $page->content;
    }
}
