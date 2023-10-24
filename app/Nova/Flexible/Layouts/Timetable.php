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
use Michielfb\Time\Time;

class Timetable extends Layout
{
    use HasTabs;
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "timetable";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Timetable";

    public static $imageSizes = [
        "image" => "square",
    ];

    /**
     * The preview Blade view for this layout
     *
     * @var string
     */
    protected $preview = true;

    // public $casts = [
    //     "timetable" => "collection",
    // ];

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
                    "" => "None",
                    "bg-white" => "White",
                    "bg-blue bg-opacity-20 " => "Blue",
                    "bg-light-teal bg-opacity-20 " => "Teal",
                    "bg-beige" => "Beige",
                ])
                ->stacked(),
            Select::make("Background colour")
                ->options([
                    "" => "None",
                    "bg-opacity-30 bg-pink" => "Pink",
                    "bg-beige bg-opacity-50" => "Beige",
                    "bg-yellow" => "Yellow",
                ])
                ->stacked(),
            NovaSwitcher::make("Reverse")->stacked(),
            Select::make("Squiggle?", "squiggle")
                ->options([
                    null => "Disabled",
                    1 => "Squiggle 1",
                    2 => "Squiggle 2",
                ])
                ->stacked(),
            Image::make("Image")->stacked(),
            Text::make("Title")->stacked(),
            Textarea::make("Description")
                ->help("Supports Markdown")
                ->stacked(),

            Heading::make("Modal"),
            Text::make("Title", "modal_title")->default(
                "Speaking club timetable"
            ),
            Text::make("Subtitle", "modal_subtitle")->default(
                "We currently host around 20 group conversation sessions per week."
            ),

            SimpleRepeatable::make("Timetable days", "timetable", [
                Text::make("Level"),
                Select::make("Day")->options([
                    "Monday" => "Monday",
                    "Tuesday" => "Tuesday",
                    "Wednesday" => "Wednesday",
                    "Thursday" => "Thursday",
                    "Friday" => "Friday",
                    "Saturday" => "Saturday",
                    "Sunday" => "Sunday",
                ]),
                Time::make("Start time"),
            ])
                ->stacked()
                ->addRowLabel("Add class"),
        ];
    }
}
