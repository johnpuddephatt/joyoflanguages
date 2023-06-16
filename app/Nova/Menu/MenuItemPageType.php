<?php

namespace App\Nova\Menu;

use Laravel\Nova\Fields\Select;
use Outl1ne\MenuBuilder\MenuItemTypes\MenuItemSelectType;

class MenuItemPageType extends MenuItemSelectType
{
    /**
     * Get the menu link identifier that can be used to tell different custom
     * links apart (ie 'page' or 'product').
     *
     * @return string
     **/
    public static function getIdentifier(): string
    {
        // Example usecase
        // return 'page';
        return "page";
    }

    /**
     * Get menu link name shown in  a dropdown in CMS when selecting link type
     * ie ('Product Link').
     *
     * @return string
     **/
    public static function getName(): string
    {
        // Example usecase
        // return 'Page Link';
        return "Page ";
    }

    /**
     * Get list of options shown in a select dropdown.
     *
     * Should be a map of [key => value, ...], where key is a unique identifier
     * and value is the displayed string.
     *
     * @return array
     **/
    public static function getOptions($locale): array
    {
        // Example usecase
        return \App\Models\Page::all()
            ->pluck("title", "id")
            ->toArray();
    }

    /**
     * Get the subtitle value shown in CMS menu items list.
     *
     * @param $value
     * @param $data The data from item fields.
     * @param $locale
     * @return string
     **/
    public static function getDisplayValue($value, ?array $data, $locale)
    {
        // Example usecase
        return "Page: " . \App\Models\Page::find($value)->title;
        // return $value;
    }

    /**
     * Get the enabled value
     *
     * @param $value
     * @param $data The data from item fields.
     * @param $locale
     * @return string
     */
    public static function getEnabledValue($value, ?array $data, $locale)
    {
        return true;
    }

    /**
     * Get the value of the link visible to the front-end.
     *
     * Can be anything. It is up to you how you will handle parsing it.
     *
     * This will only be called when using the nova_get_menu()
     * and nova_get_menus() helpers or when you call formatForAPI()
     * on the Menu model.
     *
     * @param $value The key from options list that was selected.
     * @param $data The data from item fields.
     * @param $locale
     * @return any
     */
    public static function getValue($value, ?array $data, $locale)
    {
        return \App\Models\Page::find($value)?->URL;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array An array of fields.
     */
    public static function getFields(): array
    {
        return [
            Select::make("Type")->options([
                "default" => "Default",
                "button" => "Button",
            ]),
        ];
    }

    /**
     * Get the rules for the resource.
     *
     * @return array A key-value map of attributes and rules.
     */
    public static function getRules(): array
    {
        return [];
    }

    /**
     * Get data of the link visible to the front-end.
     *
     * Can be anything. It is up to you how you will handle parsing it.
     *
     * This will only be called when using the nova_get_menu()
     * and nova_get_menus() helpers or when you call formatForAPI()
     * on the Menu model.
     *
     * @param null $data Field values
     * @return any
     */
    public static function getData($data = null)
    {
        return $data;
    }
}
