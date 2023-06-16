<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Image as ImageField;

use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Image extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "image";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Image";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    protected $casts = [
        "image" => \App\Casts\NovaMediaLibraryCast::class,
    ];

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            ImageField::make("Quote image")
                ->stacked()
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
        ];
    }
}
