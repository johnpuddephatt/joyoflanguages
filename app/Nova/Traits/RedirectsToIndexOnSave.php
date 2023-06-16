<?php
namespace App\Nova\Traits;

use Laravel\Nova\Http\Requests\NovaRequest;

trait RedirectsToIndexOnSave
{
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return "/resources/" . static::uriKey();
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return "/resources/" . static::uriKey();
    }
}
