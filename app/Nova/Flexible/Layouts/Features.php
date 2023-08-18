<?php

namespace App\Nova\Flexible\Layouts;

use App\Casts\MyFlexibleCast;
use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Features extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "features";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Features";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return array_merge(
            (new \App\Nova\Flexible\Layouts\TextWithImage())->fields(),

            [
                SimpleRepeatable::make("Features", "features", [
                    Text::make("Short title", "pre_title")->stacked(),
                    Text::make("Title")->stacked(),
                    Textarea::make("Description")
                        ->help("Supports Markdown")
                        ->stacked(),
                    MediaHubField::make("Image", "image")->stacked(),
                    MediaHubField::make("Video", "video")
                        ->stacked()
                        ->help(
                            "If both image and video are set, video will be used"
                        ),
                ])->addRowLabel("Add feature"),

                Boolean::make("Show in menu"),
            ]
        );
    }
}
