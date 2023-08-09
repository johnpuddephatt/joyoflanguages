<?php

namespace App\Nova\Flexible\Layouts;

use App\Casts\MyFlexibleCast;
use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Boolean;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Manogi\Tiptap\Tiptap;
use Trin4ik\NovaSwitcher\NovaSwitcher;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Section extends Layout
{
    use HasFlexible;

    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "section";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Section";

    public static $imageSizes = [
        // "image" => "wide",
    ];

    /**
     * The preview Blade view for this layout
     *
     * @var string
     */
    protected $preview = true;

    // public function getFieldsAttribute($value)
    // {
    //     if ($value && is_string($value) && $value !== "") {
    //         return (object) $this->cast(json_decode($value));
    //     }
    //     return $value;
    // }

    // public function getFieldsAttribute($value)
    // {
    //     if ($value && is_string($value) && $value !== "") {
    //         return $this->toFlexible(json_decode($value));
    //     }
    //     return $this->flexible("fields", [
    //         "podcast-link" => \App\Nova\Flexible\Layouts\PodcastLink::class,
    //         "blog-link" => \App\Nova\Flexible\Layouts\BlogLink::class,
    //     ]);
    // }

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
            Textarea::make("Subtitle"),
            Boolean::make("Show as button?", "show_as_button"),
        ];
    }
}
