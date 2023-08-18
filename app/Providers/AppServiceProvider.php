<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("*", function ($view) {
            $view->with(
                "settings",
                \Cache::rememberForever("settings", function () {
                    return nova_get_settings();
                })
            );

            $view->with(
                "primary_menu",
                $view->language && $view->language->menu
                    ? nova_get_menu_by_id($view->language->menu->id)
                    : nova_get_menu_by_slug("primary")
            );

            $view->with(
                "secondary_menu",
                \Cache::rememberForever("secondaryMenu", function () {
                    return nova_get_menu_by_slug("secondary")
                        ? nova_get_menu_by_slug("secondary")["menuItems"]
                        : [];
                })
            );
        });

        \Blade::directive("icon", function ($arguments) {
            // Funky madness to accept multiple arguments into the directive
            list($string, $class) = array_pad(
                explode(",", trim($arguments, "() ")),
                2,
                ""
            );

            $string = trim($string, "' ");
            $class = trim($class, "' ");
            if (!$string) {
                return null;
            }

            return "{!! str_replace('<svg ', '<svg class=\"{$class}\" ', $string) !!}";
        });

        \Blade::directive("markdown", function (string $expression) {
            return "{!! \Illuminate\Support\Str::markdown($expression ?? '') !!}";
        });

        \Blade::directive("inlineMarkdown", function (string $expression) {
            return "{!! \Illuminate\Support\Str::inlineMarkdown($expression ?? '') !!}";
        });

        \Blade::directive("removeMarkdown", function (string $expression) {
            return "{!! strip_tags(\Illuminate\Support\Str::inlineMarkdown($expression ?? '')) !!}";
        });
    }
}
