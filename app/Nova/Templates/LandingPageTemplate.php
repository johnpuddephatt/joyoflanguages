<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class LandingPageTemplate
{
    public static function name(): string
    {
        return "landing-page";
    }

    public static function label(): string
    {
        return "Landing Page";
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
                    ->addLayout(\App\Nova\Flexible\Layouts\Quote::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Reviews::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\TextWithImage::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithImages::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\TextWithChecklist::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\JumpCTA::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\FeaturesRow::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Features::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Squares::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\FeatureBlock2::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Subscriptions::class)
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\CoursesAndCurriculum::class
                    )
                    ->addLayout(
                        \App\Nova\Flexible\Layouts\VoiceOfCustomer::class
                    )
                    ->addLayout(\App\Nova\Flexible\Layouts\Faqs::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\SignOff::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\EmbeddedVideo::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\Timetable::class)
                    ->addLayout(\App\Nova\Flexible\Layouts\VideoFeedback::class)
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
