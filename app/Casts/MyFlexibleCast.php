<?php

namespace App\Casts;

use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class MyFlexibleCast extends FlexibleCast
{
    protected $layouts = [
        "hero" => \App\Nova\Flexible\Layouts\Hero::class,
        "quote" => \App\Nova\Flexible\Layouts\Quote::class,
        "latest-posts" => \App\Nova\Flexible\Layouts\LatestPosts::class,
        "podcast-link" => \App\Nova\Flexible\Layouts\PodcastLink::class,
        "blog-link" => \App\Nova\Flexible\Layouts\BlogLink::class,
        "latest-posts" => \App\Nova\Flexible\Layouts\LatestPosts::class,
        "latest-podcasts" => \App\Nova\Flexible\Layouts\LatestPodcasts::class,
        "feature-block" => \App\Nova\Flexible\Layouts\FeatureBlock::class,
        "section" => \App\Nova\Flexible\Layouts\Section::class,
        "page-hero" => \App\Nova\Flexible\Layouts\PageHero::class,
        "page-introduction" =>
            \App\Nova\Flexible\Layouts\PageIntroduction::class,
        "feature-block-with-quote" =>
            \App\Nova\Flexible\Layouts\FeatureBlockWithQuote::class,
        "text-with-bullets" =>
            \App\Nova\Flexible\Layouts\TextWithBullets::class,
    ];
}
