<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Public newsletter proxy endpoints. The pages they're posted from are
        // full-page response-cached (no per-user CSRF token is rendered).
        "newsletter/subscribe",
        "newsletter/visit",
    ];
}
