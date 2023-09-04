<?php

namespace App\Nova\Flexible\Layouts;

use App\Models\Language;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;

class LatestPosts extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "latest-posts";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Latest posts";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    // Define your accessors here
    public function getPostsAttribute()
    {
        if ($this->__get("post_ids")) {
            $post_ids = array_column($this->__get("post_ids"), "post_id");
            $post_ids_list = implode(",", $post_ids);
            return \App\Models\Post::whereIn("id", $post_ids)
                ->orderByRaw("FIELD(id, $post_ids_list)")
                ->get();
        }
        if ($this->model?->language) {
            return $this->model->language->posts->take(
                $this->__get("limit") ?? 9999
            );
        } else {
            return \App\Models\Post::take($this->__get("limit") ?? 9999)->get();
        }
    }

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            SimpleRepeatable::make("Posts", "post_ids", [
                Select::make("Post", "post_id")
                    ->options(\App\Models\Post::pluck("title", "id"))

                    ->displayUsingLabels()
                    ->stacked(),
            ])->addRowLabel("Add post"),
            Text::make("Title"),
            Number::make("Limit")->help(
                "Only applies if posts are not manually set."
            ),
        ];
    }
}
