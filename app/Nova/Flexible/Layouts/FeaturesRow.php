<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Heading;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class FeaturesRow extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "features-row";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Features row";

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
            Text::make("Pre-title", "pre_title"),
            Text::make("Title"),
            Textarea::make("Intro")->rows(2),

            SimpleRepeatable::make("Features", "features", [
                Text::make("Title")->stacked(),
                Textarea::make("Description")->rows(2),
                MediaHubField::make("Image")->stacked(),
            ])->maxRows(4),

            Textarea::make("Outro")->rows(2),
        ];
    }
}
