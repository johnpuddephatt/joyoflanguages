<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Whitecube\LaravelCookieConsent\Consent;
use Whitecube\LaravelCookieConsent\Facades\Cookies;

class CookieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Register Laravel's base cookies under the "required" cookies section:
        Cookies::essentials()
            ->session()
            ->csrf();

        // Register all Analytics cookies at once using one single shorthand method:
        if (Cache::get('settings')["google_analytics_id"] ?? false) {
            Cookies::analytics()->google(Cache::get('settings')["google_analytics_id"]);
        }

        // Register custom cookies under the pre-existing "optional" category:
        // Cookies::optional()
        //     ->name("darkmode_enabled")
        //     ->description(
        //         'This cookie helps us remember your preferences regarding the interface\'s brightness.'
        //     )
        //     ->duration(120)
        //     ->accepted(
        //         fn(Consent $consent, MyDarkmode $darkmode) => $consent->cookie(
        //             value: $darkmode->getDefaultValue()
        //         )
        //     );

        Cookies::category("commenting");

        Cookies::commenting()
            ->name("commenting_enabled")
            ->duration(60 * 24 * 90);
    }
}
