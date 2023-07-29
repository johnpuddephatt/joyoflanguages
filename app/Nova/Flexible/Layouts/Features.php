<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Heading;

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

    public static $imageSizes = [
        "image_1" => "landscape",
        "image_2" => "landscape",
        "image_3" => "landscape",
        "image_4" => "landscape",
    ];

    public function getFeaturesAttribute()
    {
        $features = [];

        foreach ([1, 2, 3, 4] as $i) {
            if (
                $this->__get("title_{$i}") ||
                $this->__get("description_{$i}") ||
                $this->__get("image_{$i}")
            ) {
                $features[] = (object) [
                    "title" => $this->__get("title_{$i}"),
                    "description" => $this->__get("description_{$i}"),
                    "image" => $this->__get("image_{$i}"),
                ];
            }
        }

        return $features;
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        $fields = [];

        foreach ([1, 2, 3, 4] as $i) {
            $fields[] = Heading::make(
                "<div class='p-3 font-bold bg-gray-200'>Feature {$i}</div>",
                "heading_{$i}"
            )
                ->stacked()
                ->asHtml();

            $fields[] = Text::make("Title", "title_{$i}")->stacked();

            $fields[] = Textarea::make("Description", "description_{$i}")
                ->help("Supports Markdown")
                ->stacked();

            $fields[] = Image::make("Image", "image_{$i}")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                })
                ->stacked();
        }
        return $fields;
    }
}
