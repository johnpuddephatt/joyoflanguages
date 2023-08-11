<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use ShuvroRoy\NovaTabs\Traits\HasTabs;
use Spatie\Tags\Tag;
use Spatie\TagsField\Tags;

class TaggedPosts extends Layout
{
    use HasTabs;
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "tagged-posts";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Tagged posts";

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
            Text::make("Title")->stacked(),
            Textarea::make("Subtitle")->stacked(),
            Select::make("Tag", "tag")
                ->options(
                    array_combine(
                        Tag::pluck("slug")->toArray(),
                        Tag::pluck("name")->toArray()
                    )
                )
                ->placeholder("Select tag")
                ->stacked(),
        ];
    }

    public function getPostsAttribute()
    {
        if (!$this->__get("tag")) {
            return false;
        }

        if ($this->model->language) {
            return $this->model->language
                ->posts()
                ->withAnyTags([$this->__get("tag")])
                ->get();
        } else {
            return \App\Models\Post::withAnyTags([$this->__get("tag")])->get();
        }
    }

    public function getViewAllPostsLinkAttribute()
    {
        return \App\Models\Page::getTemplateUrl(
            \App\Nova\Templates\PostsPageTemplate::class,
            $this->model->language_id
        ) ??
            \App\Models\Page::getTemplateUrl(
                \App\Nova\Templates\PostsPageTemplate::class
            );
    }
}
