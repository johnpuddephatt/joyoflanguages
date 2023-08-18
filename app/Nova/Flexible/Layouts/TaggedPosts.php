<?php

namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\File;
use ShuvroRoy\NovaTabs\Traits\HasTabs;
use Spatie\Tags\Tag;
use Spatie\TagsField\Tags;
use App\Nova\Actions\SaveAndResizeVideo;
use App\Nova\Actions\SaveAndResizeImage;
use Laravel\Nova\Fields\Image;
use Illuminate\Support\Facades\Storage;

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

    public static $imageSizes = [
        "image" => "portrait",
    ];

    public static $videoSizes = [
        "video" => [375, 795],
    ];

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
            Image::make("Image")
                ->store(new SaveAndResizeImage())
                ->preview(function ($value, $disk) {
                    return isset($value->image)
                        ? Storage::disk($disk)->url($value->image)
                        : null;
                }),
            File::make("Video", "video")
                ->store(new SaveAndResizeVideo())
                ->acceptedTypes(".mp4"),
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
                ->shuffle()
                ->take(3)
                ->get();
        } else {
            return \App\Models\Post::withAnyTags([$this->__get("tag")])
                ->shuffle()
                ->take(3)
                ->get();
        }
    }

    public function getPostsLinkAttribute()
    {
        return (\App\Models\Page::getTemplateUrl(
            \App\Nova\Templates\PostsPageTemplate::class,
            $this->model->language_id
        ) ??
            \App\Models\Page::getTemplateUrl(
                \App\Nova\Templates\PostsPageTemplate::class
            )) .
            "?tag=" .
            $this->__get("tag");
    }
}
