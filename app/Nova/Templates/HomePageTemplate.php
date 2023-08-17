<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class HomePageTemplate
{
    public static function name(): string
    {
        return "home-page";
    }

    public static function label(): string
    {
        return "Home page";
    }

    public static function unique(): bool
    {
        return false;
    }

    // Fields displayed in CMS
    public function fields(Request $request): array
    {
        return [
            Panel::make("Page content", [
                Flexible::make("", "content")
                    ->addLayout(\App\Nova\Flexible\Layouts\Hero::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\HeroWithVideo::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithBullets::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\FeatureBlockWithQuote::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\FeatureBlock::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\LatestPodcasts::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\LanguagesPostsLinks::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\Quote::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Newsletter::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\LatestPosts::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\TaggedPosts::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Faqs::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\SignOff::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\EmbeddedVideo::class)

                    // ->addLayout(\App\Nova\Flexible\Layouts\Statement::class)
                    // ->addLayout(\App\Nova\Flexible\Layouts\FeatureBanner::class)
                    // ->addLayout(\App\Nova\Flexible\Layouts\TextWithLinks::class)
                    // ->addLayout(
                    //     \App\Nova\Flexible\Layouts\TextWithSidebar::class
                    // )
                    ->enablePreview(
                        \Illuminate\Support\Facades\Vite::asset(
                            "resources/css/app.css"
                        )
                    )
                    ->stacked(),
            ]),
        ];
    }

    // Resolve data for serialization
    public function resolve($page)
    {
        return $page->content;
    }
}
