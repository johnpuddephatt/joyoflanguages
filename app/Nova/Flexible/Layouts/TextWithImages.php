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

    // public static $imageSizes = [
    //     "image_1" => "uncropped",
    //     "image_2" => "uncropped",
    //     "image_3" => "uncropped",
    //     "image_4" => "uncropped",
    // ];

    // public function getImagesAttribute()
    // {
    //     $images = [];

    //     foreach (range(1, 4) as $i) {
    //         if ($this->__get("image_{$i}")) {
    //             $images[] = $this->__get("image_{$i}");
    //         }
    //     }

    //     return $images;
    // }

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

            // Image::make("Image", "image_1")
            //     ->store(new SaveAndResizeImage())
            //     ->preview(function ($value, $disk) {
            //         return isset($value->image)
            //             ? Storage::disk($disk)->url($value->image)
            //             : null;
            //     })
            //     ->stacked(),

            // Image::make("Image", "image_2")
            //     ->store(new SaveAndResizeImage())
            //     ->delete(function (NovaRequest $request, $model, $disk, $path) {
            //         dd($request, $model, $disk, $path);

            //         // Storage::disk($disk)->delete($path);

            //         // return [
            //         //     "attachment" => null,
            //         //     "attachment_name" => null,
            //         //     "attachment_size" => null,
            //         // ];
            //     })
            //     ->preview(function ($value, $disk) {
            //         return isset($value->image)
            //             ? Storage::disk($disk)->url($value->image)
            //             : null;
            //     })
            //     ->stacked(),

            // Image::make("Image", "image_3")
            //     ->store(new SaveAndResizeImage())
            //     ->preview(function ($value, $disk) {
            //         return isset($value->image)
            //             ? Storage::disk($disk)->url($value->image)
            //             : null;
            //     })
            //     ->stacked(),

            // Image::make("Image", "image_4")
            //     ->store(new SaveAndResizeImage())
            //     ->preview(function ($value, $disk) {
            //         return isset($value->image)
            //             ? Storage::disk($disk)->url($value->image)
            //             : null;
            //     })
            //     ->stacked(),
        ];
    }
}
