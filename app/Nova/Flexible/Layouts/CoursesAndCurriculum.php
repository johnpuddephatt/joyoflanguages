<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
// use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use NormanHuth\Values\Values;
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
            Flexible::make("Courses")
                ->addLayout(\App\Nova\Flexible\Layouts\Sublayouts\Course::class)
                ->stacked()
                ->button("Add Course"),
        ];
    }

    public function getCoursesAttribute()
    {
        return $this->flexible("courses", [
            "course" => \App\Nova\Flexible\Layouts\Sublayouts\Course::class,
        ]);
    }
}
