<?php

namespace App\Nova\Menu;

use Laravel\Nova\Fields\Select;
use Outl1ne\MenuBuilder\MenuItemTypes\BaseMenuItemType;

class MenuItemStaticURLType extends BaseMenuItemType
{
    public static function getIdentifier(): string
    {
        return "static-url";
    }

    public static function getName(): string
    {
        return "Static URL";
    }

    public static function getType(): string
    {
        return "static-url";
    }

    public static function getRules(): array
    {
        return [
            "value" => "required|max:255",
        ];
    }

    public static function getFields(): array
    {
        return [
            Select::make("Type")
                ->options([
                    "default" => "Default",
                    "button" => "Button",
                ])
                ->default("default"),
        ];
    }
}
