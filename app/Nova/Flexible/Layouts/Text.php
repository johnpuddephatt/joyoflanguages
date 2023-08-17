<?php
namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;

class Text extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "text";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Text";

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
            Tiptap::make("Content")
                ->stacked()
                ->buttons(["bold", "italic", "link"])
                ->withMeta([
                    "extraAttributes" => [
                        "placeholder" => "Start writing...",
                    ],
                ]),
        ];
    }
}
