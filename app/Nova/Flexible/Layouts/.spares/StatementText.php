<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Select;
use Manogi\Tiptap\Tiptap;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class StatementText extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "statement-text";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Statement text";

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
            Tiptap::make("Text")
                ->buttons(["heading", "|", "bold", "italic", "|", "blockquote"])
                ->headingLevels([2, 3])
                ->withMeta([
                    "extraAttributes" => [
                        "placeholder" => "Start writing...",
                    ],
                ]),

            Heading::make("Settings"),
            Select::make("Text colour")->options([
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
                "white" => "White",
                "black" => "Black",
            ]),
            Select::make("Background colour")->options([
                "teal" => "Teal",
                "lilac" => "Lilac",
                "red" => "Red",
                "gray" => "Grey",
                "black" => "Black",
            ]),
        ];
    }
}
