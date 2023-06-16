<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;

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
        return \App\Models\User::where("show_in_staff_directory", true)->get();
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
