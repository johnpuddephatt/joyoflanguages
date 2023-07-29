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

class JumpCTA extends Layout
{
    use HasFlexible;

    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "jump-cta";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Jump Call to Action";

    public static $imageSizes = [
        // "image" => "wide",
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
            Text::make("Title"),
            Text::make("Button text"),
            Text::make("Button link"),
            Boolean::make("Open in new tab?", "new_tab"),
        ];
    }
}
