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

class TextWithImages extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-images";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Images";

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
            NovaSwitcher::make("Reverse")->stacked(),

            Text::make("Title")->stacked(),

            Textarea::make("Text")

                ->help("Supports Markdown")
                ->stacked(),

            MediaHubField::make("Images", "images")
                ->multiple()
                ->stacked(),

            Select::make("Squiggle?")
                ->options([
                    null => "Disabled",
                    1 => "Squiggle 1",
                    2 => "Squiggle 2",
                ])
                ->stacked(),

            Boolean::make("Show shapes?", "show_shape")->stacked(),
        ];
    }
}
