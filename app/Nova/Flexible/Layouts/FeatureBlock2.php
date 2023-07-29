<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use App\Nova\Repeater\Button;
use Illuminate\Support\Facades\Storage;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Repeater;
use Manogi\Tiptap\Tiptap;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use ShuvroRoy\NovaTabs\Tab;
use ShuvroRoy\NovaTabs\Tabs;
use ShuvroRoy\NovaTabs\Traits\HasActionsInTabs;
use ShuvroRoy\NovaTabs\Traits\HasTabs;
use Whitecube\NovaFlexibleContent\Flexible;

class FeatureBlock2 extends Layout
{
    use HasTabs;
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "feature-block-2";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Feature banner (alternative)";

    public static $imageSizes = [
        "image" => "square",
    ];

    /**
     * The preview Blade view for this layout
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
            Select::make("Colour")
                ->options([
                    "blue" => "Blue",
                    "light-teal" => "Teal",
                    "beige" => "Beige",
                ])
                ->stacked(),
            NovaSwitcher::make("Reverse")->stacked(),
            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                })
                ->stacked(),
            Text::make("Title")->stacked(),
            Textarea::make("Description")
                ->maxLength(250)
                ->enforceMaxLength()
                ->help("Supports Markdown")
                ->stacked(),

            Heading::make("Button 1")->withMeta([
                "class" => "bg-gray-200",
            ]),
            Text::make("Button URL")->stacked(),
            Text::make("Button text")->stacked(),

            Heading::make("Button 2"),
            Text::make("Button URL", "button_2_url")->stacked(),
            Text::make("Button text", "button_2_text")->stacked(),

            SimpleRepeatable::make("Images", "images", [
                MediaHubField::make("Image")->stacked(),
                Text::make("Caption")->stacked(),
            ])->stacked(),
        ];
    }
}
