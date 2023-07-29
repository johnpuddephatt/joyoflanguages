<?php

namespace App\Nova;

use App\Nova\Actions\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Manogi\Tiptap\Tiptap;
use App\Nova\Actions\SaveAndResizeImage;
use App\Nova\Traits\RedirectsToIndexOnSave;
use Illuminate\Support\Facades\Storage;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class User extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = "name";

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ["id", "name", "email"];

    public static $clickAction = "edit";
    use RedirectsToIndexOnSave;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->hideFromIndex(),

            Boolean::make("Enable login"),
            Boolean::make("Show in staff directory"),

            Text::make("Name")
                ->sortable()
                ->rules("required", "max:255"),

            Slug::make("Slug")
                ->from("Name")
                ->hideFromIndex(),

            Text::make("Email")
                ->sortable()
                ->rules("required", "email", "max:254")
                ->creationRules("unique:users,email")
                ->updateRules("unique:users,email,{{resourceId}}"),

            Password::make("Password")
                ->onlyOnForms()
                ->creationRules("required", Rules\Password::defaults())
                ->updateRules("nullable", Rules\Password::defaults()),

            Panel::make("Profile", [
                Text::make("Role"),
                MediaHubField::make("Photo")->defaultCollection("users"),
                Tiptap::make("Biography"),
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [(new ResetPassword())->showInline()];
    }
}
