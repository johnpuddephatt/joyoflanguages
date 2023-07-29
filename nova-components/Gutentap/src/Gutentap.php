<?php

namespace Jdp\Gutentap;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class Gutentap extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = "gutentap";

    protected function fillAttributeFromRequest(
        NovaRequest $request,
        $requestAttribute,
        $model,
        $attribute
    ) {
        if ($request->exists($requestAttribute)) {
            $model->{$attribute} = json_decode(
                $request[$requestAttribute],
                true
            );
        }
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize();
    }
}
