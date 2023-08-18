<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Whitecube\NovaFlexibleContent\Flexible;

class CoursesAndCurriculum extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "courses-and-curriculum";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Courses and curriculum";

    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make("Short title", "pre_title")->stacked(),
            Text::make("Title")->stacked(),
            Textarea::make("Introduction")
                ->stacked()
                ->help("Accepts Markdown"),
            Image::make("Image")->stacked(),
            Flexible::make("Courses")
                ->addLayout(\App\Nova\Flexible\Layouts\Sublayouts\Course::class)
                ->stacked()
                ->collapsed()
                ->button("Add Course"),
            Boolean::make("Show in menu"),
            Textarea::make("Outro")
                ->rows(3)
                ->stacked()
                ->help("Accepts Markdown"),
        ];
    }

    public function getCoursesAttribute()
    {
        return $this->flexible("courses", [
            "course" => \App\Nova\Flexible\Layouts\Sublayouts\Course::class,
        ]);
    }
}
