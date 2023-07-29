<?php

namespace Jdp\Gutentap;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;
use Outl1ne\NovaMediaHub\Http\Middleware\Authorize;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script("gutentap", __DIR__ . "/../dist/js/field.js");
            Nova::style("gutentap", __DIR__ . "/../dist/css/field.css");
        });
    }
}
