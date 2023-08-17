<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;

class LatestPodcasts extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "latest-podcasts";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Latest podcasts";

    public static $imageSizes = [
        "image" => "square",
    ];

    // Define your accessors here
    public function getPodcastsAttribute()
    {
        return \App\Models\Podcast::take($this->__get("limit") ?? 3)->get();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Title"),
            Textarea::make("Description"),
            Text::make("Button text"),
            Text::make("Button URL")->help(
                "Leave blank to generate automatically based on page language"
            ),
            Number::make("Limit"),
            Image::make("Image", "image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
        ];
    }
}
