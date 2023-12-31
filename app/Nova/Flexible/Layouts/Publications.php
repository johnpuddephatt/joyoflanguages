<?php

namespace App\Nova\Flexible\Layouts;

use App\Nova\Actions\SaveAndResizeImage;
use Illuminate\Support\Facades\Storage;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Manogi\Tiptap\Tiptap;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Trin4ik\NovaSwitcher\NovaSwitcher;

class Publications extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "publications";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Publications";

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
            SimpleRepeatable::make("Publications", "publications", [
                Text::make("Title")->stacked(),
                Text::make("Publication name")->stacked(),
                Select::make("Type")
                    ->options([
                        "radio" => "Radio",
                        "article" => "Article",
                        "video" => "Video",
                    ])
                    ->stacked(),
                Text::make("Link")->stacked(),
            ])->addRowLabel("Add new publication"),
        ];
    }
}
