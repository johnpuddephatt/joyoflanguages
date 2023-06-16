<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Manogi\Tiptap\Tiptap;

use Trin4ik\NovaSwitcher\NovaSwitcher;

use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextWithImage extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text-with-image";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text With Image";

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
            NovaSwitcher::make("Reverse")->stacked(),

            Text::make("Title")->stacked(),

            Tiptap::make("Main")
                ->stacked()
                ->buttons(["bold", "italic", "link"])
                ->withMeta([
                    "extraAttributes" => [
                        "placeholder" => "Start writing...",
                    ],
                ]),

            Image::make("Image")
                ->stacked()
                ->acceptedTypes(".svg"),
        ];
    }
}
