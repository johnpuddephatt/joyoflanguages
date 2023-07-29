<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;

class PageController extends Controller
{
    // public function home(Language $language = null)
    // {
    //     dd($language);
    //     $page = $language
    //         ->pages()
    //         ->where("template", "App\Nova\Templates\HomePageTemplate")
    //         ->firstOrFail();

    //     return view("templates.home-page", [
    //         "page" => $page->resolveContent(),
    //         "language" => $language,
    //     ]);
    // }

    public function show(Language $language = null, $slug = null)
    {
        $slug_parts = explode("/", $slug);

        if ($language) {
            $page = $language
                ->pages()
                ->where("slug", end($slug_parts) ?: "/")
                ->firstOrFail();
        } else {
            $page = Page::doesntHave("language")
                ->where("slug", end($slug_parts) ?: "/")
                ->firstOrFail();
        }

        if (
            count($slug_parts) > 1 &&
            $page->parent->slug != $slug_parts[count($slug_parts) - 2]
        ) {
            abort(404);
        }

        return view("templates." . (new $page->template())->name(), [
            "page" => $page->resolveContent(),
            "language" => $language,
        ]);
    }
}
