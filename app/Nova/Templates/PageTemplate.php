<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class PageTemplate
{
    public static function name(): string
    {
        return "page";
    }

    public static function label(): string
    {
        return "Page";
    }

    public static function unique(): bool
    {
        return false;
    }

    // Fields displayed in CMS
    public function fields(Request $request): array
    {
        return [
            Panel::make("Content", [
                Flexible::make("", "content")
                    ->addLayout(\App\Nova\Flexible\Layouts\PageHero::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Text::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithSectionNavigation::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithSidebar::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithPullout::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\FeatureBanner::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\TextWithImage::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithRoundImage::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\Image::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\ImagePair::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Quote::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Team::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\ContactDetails::class
                    )
                    ->enablePreview(
                        \Illuminate\Support\Facades\Vite::asset(
                            "resources/css/app.css"
                        )
                    )
                    ->stacked()
                    ->button("Add content"),
            ]),
        ];
    }

    // Resolve data for serialization
    public function resolve($page)
    {
        return $page->content;
    }
}
