<?php

namespace App\Nova;

use App\Nova\Traits\RedirectsToIndexOnSave;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Jdp\Gutentap\Gutentap;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Trix;
use ShuvroRoy\NovaTabs\Tab;
use ShuvroRoy\NovaTabs\Tabs;
use ShuvroRoy\NovaTabs\Traits\HasActionsInTabs;
use ShuvroRoy\NovaTabs\Traits\HasTabs;
use Naif\ToggleSwitchField\ToggleSwitchField;
use Spatie\TagsField\Tags;
use Laravel\Nova\Fields\Tag;

class Podcast extends Resource
{
    use HasTabs;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Podcast::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = "title";

    public static $orderBy = ["episode_number" => "desc"];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ["title", "episode_number"];

    public static $clickAction = "edit";

    use RedirectsToIndexOnSave;

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withoutGlobalScopes(["published"]);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->hideFromIndex(),
            Select::make("Language", "language_id")
                ->options(
                    \App\Models\Language::all()
                        ->pluck("name", "id")
                        ->toArray()
                )
                ->displayUsingLabels()
                ->hideFromIndex()
                ->nullable(),

            Text::make("Languages", "languages", function () {
                if ($this->language) {
                    return "<span class='inline-flex items-center whitespace-nowrap min-h-6 px-2 rounded-full uppercase text-xs font-bold bg-primary-50 dark:bg-primary-500 text-primary-600 dark:text-gray-900 space-x-1 !pl-2 !pr-1'>{$this->language->name}</span>";
                }
            })
                ->asHtml()
                ->onlyOnIndex(),

            Number::make("Episode", "episode_number")
                ->default(\App\Nova\Podcast::max("episode_number") + 1)
                ->readonly(),
            Text::make("Title")
                ->rules("required", "string", "max:100")
                ->maxlength(100)
                ->enforceMaxlength()
                ->readonly(),
            Slug::make("Slug")
                ->from("Title")
                ->hideFromIndex()
                ->readonly(),
            Textarea::make("Introduction")
                ->rules("required", "string", "max:250")
                ->hideFromIndex()
                ->maxlength(250)
                ->enforceMaxlength()
                ->rows(2),
            Tags::make("Tags")->fillUsing(function (
                $request,
                $model,
                $attribute,
                $requestAttribute
            ) {
                if ($request->input($requestAttribute)) {
                    $model->{$attribute} = explode(
                        "-----",
                        Str::of($request->input($requestAttribute))->lower()
                    );
                }
            }),

            // Date::make("Date", "published_at")->readonly(),

            \Trin4ik\NovaSwitcher\NovaSwitcher::make("Published"),

            Tabs::make("Content", [
                Tab::make(__("Article"), [
                    Gutentap::make(
                        "Content",
                        "content->article"
                    )->hideFromIndex(),
                ]),
                Tab::make(__("Transcript"), [
                    Gutentap::make(
                        "Content",
                        "content->transcript"
                    )->hideFromIndex(),
                ]),
                Tab::make(__("Bonus materials"), [
                    Gutentap::make(
                        "Content",
                        "content->bonus_materials"
                    )->hideFromIndex(),
                ]),
                Tab::make(__("RSS Content"), [
                    Heading::make(
                        "The content below was fetched automatically from the podcast RSS feed. If no article is provided this content will be shown on the podcast page. This is good for older podcast episodes."
                    )->asHtml(),

                    Trix::make("RSS Content")->readonly(),
                ]),
            ]),
            BelongsToMany::make("Languages")->filterable(),
        ];
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
