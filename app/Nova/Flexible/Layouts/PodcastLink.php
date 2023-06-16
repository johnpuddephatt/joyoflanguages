<?php
namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Select;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;

class PodcastLink extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "podcast-link";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Podcast link";

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
            Select::make("Podcast", "podcast_id")
                ->options(
                    \App\Models\Podcast::all()
                        ->pluck("title", "id")
                        ->toArray()
                )
                ->displayUsingLabels()
                ->stacked()
                ->rules("required"),
        ];
    }

    public function getPodcastAttribute()
    {
        return \App\Models\Podcast::find($this->__get("podcast_id"));
    }
}
