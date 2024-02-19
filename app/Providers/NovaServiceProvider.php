<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Panel;
use Outl1ne\NovaSettings\NovaSettings;

use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        NovaSettings::addSettingsFields([
            Panel::make("Brand", [
                Avatar::make("Logo")->acceptedTypes(".svg"),
                Textarea::make("Mission"),
            ]),
            Panel::make("Contact details", [
                Text::make("Email address", "company_email"),
                Text::make("Address", "company_address"),
                Text::make("Company legal details", "company_legal"),
            ]),
            Panel::make("Social media", [
                Image::make("OpenGraph fallback image", "og_fallback")->help(
                    "This image will be used when sharing links to pages on the site that do not have an image set."
                ),
                Text::make("Facebook"),
                Text::make("Twitter"),
                Text::make("Instagram"),
                Text::make("LinkedIn"),
            ]),
            Panel::make("Newsletter signup", [
                Text::make("Title", "newsletter_title"),
                Textarea::make("Description", "newsletter_description")
                    ->maxLength(250)
                    ->enforceMaxLength(),
                Text::make("Placeholder", "newsletter_placeholder"),
                Text::make("Form action", "newsletter_form_action"),
                Text::make("Button text", "newsletter_button_text"),
                Text::make("Sticker", "newsletter_sticker")->help(
                    "Leave blank to hide"
                ),
                Image::make("Pop-up image", "newsletter_popup_image")

            ]),
            Panel::make("Debug", [
                File::make("Wordpress XML", "wordpress_xml")
                    ->path("feed")
                    ->storeAs(function () {
                        return "wordpress.xml";
                    })
                    ->help(
                        "Upload the Wordpress XML file before running the import command through Artisan (php artisan fetch:wordpress)"
                    ),
            ]),
        ]);

        Nova::footer(function ($request) {
            return "
            <style>
                html:not(.dark) [data-testid='content'] > div:nth-of-type(1) { padding-bottom: 6rem; min-height: 100%; background-image: linear-gradient(to bottom, rgb(220,230,240), transparent);}
                #nova { position: relative;}
                header {box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.1) 0px 1px 2px -1px}
                .editor-js, #editor-js-content {
                    padding-top: 0.5em;
                    padding-bottom: 0.5em;
                    border-radius: 0.25em;
                    box-shadow: none;
                    width: 73.75%;
                }
                .ce-toolbar__content,
                .ce-block__content {
                    margin-left: 0;
                }
 
                .ce-toolbar__actions {
                    margin-right: 2em !important;
                }
 
                .md\:pt-2  > .editor-js, .md\:pt-2  > #editor-js-content {
                    padding-top: 3rem;
                    border: none;
                    box-shadow: none;
                    width: calc(125% + 4rem);
                    padding-left: 0;
                    margin-left: -2rem;
                    margin-right: -2rem;
                    margin-top: -2.2rem;
                    background-color: white;
                    color: inherit;
                    font-size: 1rem;
                }
                .md\:pt-2 .ce-block {
                    width: 60%;
                    margin: 0 auto;
                }
                .md\:pt-2 .ce-block__content {
                    max-width: 860px;
                    padding: 0 2rem;
                    margin: 0 !important;
                }
 
                .md\:pt-2 .ce-toolbar__content {
                    max-width: 60%;
                    margin-left: auto;
                }
 
                .cdx-settings-button[data-tune='withBorder'],
                .cdx-settings-button[data-tune='withBackground'],
                .cdx-settings-button[data-tune='stretched'] {
                    display: none;
                }
 
                .ce-toolbar__actions {
                    margin-right: 0;
                    padding-right: 0;
                    border-radius: 0.5em;
                    border: 1px solid #eee;
                    background-color: white;
                }
 
                .ce-toolbar__plus,
                .ce-toolbar__settings-btn {    
                    border-radius: 0.5em;
                    padding: 0.4em;
                }
 
                .ce-header {
                    font-weight: bold !important;
                }
 
                .cdx-quote-settings {
                    display: none;
                }
 
                .toggle-block__icon > svg {
                    display: inline-block;
                }
                .toggle-block__item {
                    margin-left: 0;
                }
                .toggle-block__selector {
                    border: 1px solid rgba(var(--colors-gray-300));
                    margin-bottom: 0.25em;
                    border-radius: 0.25rem;
                    padding-left: 0.5rem;
                    margin-top: 0.5rem;
                }
                .toggle-block__item .ce-block__content .cdx-block {
                    border: 1px solid rgba(var(--colors-gray-300));
                    background-color: white;
                    padding-left: 1.75rem;
                    border-radius: 0.25rem;
                }
                .toggle-block__item + .toggle-block__item .ce-block__content .cdx-block {
                    border-top: none;
                    margin-top: -0.25rem;
                    padding-top: 0.25rem;
                }
 
                .editor-js h2 {
                    font-size: 30px;
                }
 
                .ce-toolbar__settings-btn {
                    width: 26px;
                    margin-left: 0px;
                }
 
                .cdxcarousel-list {
                    gap: 1rem;
                }
 
                .cdxcarousel-block {
                    width: 45%;
                    border: 1px solid rgba(var(--colors-gray-300));
                    flex: 1 0 auto;
                    border-radius: 0.5rem;
                }
 
                .cdxcarousel-caption {
                    margin: 5px;
                    width: auto;
                }
 
                .cdxcarousel-item img {
                    margin-bottom: 0px;
                }
 
                .cdxcarousel-item {
                    height: auto;
                    padding: 0;
                }

                .fields .simple-repeatable.form-field .simple-repeatable-row {
                    position: relative;
                    z-index: 10;
                    margin-left: 0;
                    padding-left: 0;
                    width: 100%;
                    border: 1px solid #ddd;
                    padding: 4px;
                    margin: 8px 0;
                }

                 .fields .simple-repeatable.form-field .simple-repeatable-row::before {
                    content: '';
                    display: block;
                    position: absolute;
                    top: 0;
                    left:0;
                    width: 100%;
                    height: 40px;
                    background-color: rgba(var(--colors-slate-100));
                    z-index: -10;
                    border-bottom: 1px solid #ddd;
                
                 }
                

                .fields .simple-repeatable-fields-wrapper {
                    padding-top: 28px;
                    margin: 0 -24px;
                }

                .group  .simple-repeatable.form-field .simple-repeatable-row>.simple-repeatable-fields-wrapper>*>:first-child:not(:only-child) {
                    display: block;
                    padding-left: 0;
                }
            </style>";
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define("viewNova", function ($user) {
            return $user->enable_login;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [new \App\Nova\Dashboards\Main()];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Outl1ne\MenuBuilder\MenuBuilder::make()->icon("menu"),
            new \Outl1ne\NovaSettings\NovaSettings(),
            \Outl1ne\NovaMediaHub\MediaHub::make(),
            \Laravel\Nova\LogViewer\LogViewer::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
