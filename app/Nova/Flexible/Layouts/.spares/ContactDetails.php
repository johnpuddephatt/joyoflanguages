<?php
namespace App\Nova\Flexible\Layouts;

use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Manogi\Tiptap\Tiptap;

class ContactDetails extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = "contact-details";

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = "Contact details";

    /**
     * Enable preview for this layout
     *
     * @var string
     */
    protected $preview = true;

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
