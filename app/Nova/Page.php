<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;

use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Image;
use App\Nova\Actions\SaveAndResizeImage;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use App\Nova\Traits\RedirectsToIndexOnSave;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;

class Page extends Resource
{
    use RedirectsToIndexOnSave;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Page::class;

    public static $clickAction = "edit";

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = "title";

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ["id"];

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withoutGlobalScope("published")->orderPagesByUrl();
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        if ($request->resourceId) {
            return $query->whereNotIn("id", [$request->resourceId]);
        }
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $fields = [
            ID::make()->hideFromIndex(),

            BelongsTo::make("Language")->nullable(),

            Text::make("Title")
                ->rules("required", "string", "max:200")
                ->hideFromIndex(function (ResourceIndexRequest $request) {
                    return !$request->viaRelationship();
                }),

            Text::make("Title", function () {
                return \Illuminate\Support\Str::limit(
                    $this->indented_title(),
                    96
                );
            })
                ->asHtml()
                ->hideFromDetail()
                ->hideFromIndex(function (ResourceIndexRequest $request) {
                    return $request->viaRelationship();
                }),

            Slug::make("Slug")->from("Title"),


            Text::make("Redirect")
                ->rules("nullable", "string", "max:200")
                ->hideFromIndex()
                ->help(
                    'Redirects to another page. Can be relative or absolute, e.g.: "/blog" or "https://example.com"'
                ),

            Boolean::make("Redirect override enabled", "redirect_override_enabled")->help('If enabled, the redirect can be overridden by visiting ' . $this->url . '/?preview=' . dechex($this->id * 4001))->hideFromIndex(),

            Textarea::make("Introduction")->rules("max:300"),

            MediaHubField::make("Image", "image"),

            Select::make("Template")
                ->options(
                    \App\Models\Page::getAvailableTemplates(
                        $request->resourceId ||
                            $request->isResourceIndexRequest()
                    )
                )
                ->displayUsingLabels()
                ->readonly(function ($request) {
                    return $request->isUpdateOrUpdateAttachedRequest();
                })
                ->help(
                    "The template value cannot be changed after page creation to prevent data loss. Some templates can only be used once."
                )
                ->required(),

            Select::make("Theme")
                ->options([
                    "default" => "Default",
                    "alternative_header" => "Alternative header",
                ])
                ->hideFromIndex(),

            Text::make("Visit", null, function () {
                return "<a href='" .
                    $this->url .
                    "' target='_blank' class='font-semibold px-4 border-2 rounded text-slate-500 border-slate-500'>Visit</a>";
            })
                ->onlyOnIndex()
                ->asHtml(),
        ];

        if ($this->template !== "home-page") {
            $fields = array_merge($fields, [
                Select::make("Parent page", "parent_id")
                    ->options(
                        \App\Models\Page::where(
                            "language_id",
                            $this->language_id
                        )
                            ->where("id", "!=", $this->id)
                            ->orderBy("title")
                            ->pluck("title", "id")
                    )
                    ->nullable()
                    ->hideFromIndex(),
            ]);
        }

        if ($request->resourceId && $this->template) {
            $fields = array_merge(
                $fields,
                (new $this->template())->fields($request)
            );
        }

        if ($this->template !== "home-page") {
            $fields = array_merge($fields, [
                HasMany::make("Child pages", "children", \App\Nova\Page::class),
            ]);
        }

        return $fields;
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
