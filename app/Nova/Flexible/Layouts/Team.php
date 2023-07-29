<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;

class Team extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "team";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Team";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    public function getTeamAttribute()
    {
        $skip = $GLOBALS["staff_count"] ?? 0;
        $GLOBALS["staff_count"] = $this->__get("count");
        return \App\Models\User::where("show_in_staff_directory", true)
            ->skip($skip)
            ->take($this->__get("count"))
            ->get();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Number::make("Count", "count")
                ->min(1)
                ->step(1)
                ->default(4)
                ->rules("required", "numeric"),
        ];
    }
}
