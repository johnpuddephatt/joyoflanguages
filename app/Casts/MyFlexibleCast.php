<?php

namespace App\Casts;

use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class MyFlexibleCast extends FlexibleCast
{
    protected $layouts = [
        "hero" => \App\Nova\Flexible\Layouts\Hero::class,
        "hero-with-video" => \App\Nova\Flexible\Layouts\HeroWithVideo::class,
        "text-with-images" => \App\Nova\Flexible\Layouts\TextWithImages::class,
        "quote" => \App\Nova\Flexible\Layouts\Quote::class,
        "latest-posts" => \App\Nova\Flexible\Layouts\LatestPosts::class,
        "podcast-link" => \App\Nova\Flexible\Layouts\PodcastLink::class,
        "blog-link" => \App\Nova\Flexible\Layouts\BlogLink::class,
        "latest-posts" => \App\Nova\Flexible\Layouts\LatestPosts::class,
        "latest-podcasts" => \App\Nova\Flexible\Layouts\LatestPodcasts::class,
        "tagged-posts" => \App\Nova\Flexible\Layouts\TaggedPosts::class,
        "languages-posts-links" =>
            \App\Nova\Flexible\Layouts\LanguagesPostsLinks::class,

        "feature-block" => \App\Nova\Flexible\Layouts\FeatureBlock::class,
        "feature-block-2" => \App\Nova\Flexible\Layouts\FeatureBlock2::class,
        "section" => \App\Nova\Flexible\Layouts\Section::class,

        "page-hero" => \App\Nova\Flexible\Layouts\PageHero::class,
        "page-introduction" =>
            \App\Nova\Flexible\Layouts\PageIntroduction::class,
        "feature-block-with-quote" =>
            \App\Nova\Flexible\Layouts\FeatureBlockWithQuote::class,
        "text-with-bullets" =>
            \App\Nova\Flexible\Layouts\TextWithBullets::class,
        "team" => \App\Nova\Flexible\Layouts\Team::class,
        "jump-cta" => \App\Nova\Flexible\Layouts\JumpCTA::class,
        "features" => \App\Nova\Flexible\Layouts\Features::class,
        "feature" => \App\Nova\Flexible\Layouts\Feature::class,
        "squares" => \App\Nova\Flexible\Layouts\Squares::class,
        "courses-and-curriculum" =>
            \App\Nova\Flexible\Layouts\CoursesAndCurriculum::class,
        "text-with-checklist" =>
            \App\Nova\Flexible\Layouts\TextWithChecklist::class,
        "faqs" => \App\Nova\Flexible\Layouts\Faqs::class,
        "voice-of-customer" =>
            \App\Nova\Flexible\Layouts\VoiceOfCustomer::class,
        "subscriptions" => \App\Nova\Flexible\Layouts\Subscriptions::class,
        "sign-off" => \App\Nova\Flexible\Layouts\SignOff::class,
    ];
}
