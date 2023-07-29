<?php

namespace App\Nova\Flexible\Layouts;

use App\Casts\MyFlexibleCast;
use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Feature extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "feature";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Feature";

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
        return [
            NovaSwitcher::make("Reversed?", "reverse"),

            Text::make("Title")->stacked(),

            Textarea::make("Text")
                ->help("Supports Markdown")
                ->stacked(),

            MediaHubField::make("Image", "image")->stacked(),

            MediaHubField::make("Video", "video")
                ->stacked()
                ->help("If both image and video are set, video will be used"),

            Textarea::make("Content")
                ->stacked()
                ->help("Supports Markdown"),
        ];
    }
}
