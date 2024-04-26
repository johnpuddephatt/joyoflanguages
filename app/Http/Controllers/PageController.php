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
            if (
                is_numeric($slug) &&
                \App\Models\Podcast::where("episode_number", $slug)->first()
            ) {

                $slug = \App\Models\Podcast::where(
                    "episode_number",
                    $slug
                )->first()->slug;
                return redirect()->route("language.podcast.show", [
                    "podcast" => $slug,
                    "language" => $language,
                ]);
            } elseif (

                !strpos($slug, "/") &&
                \App\Models\Post::where("slug", $slug)->first()
            ) {

                return redirect()->route("language.post.show", [
                    "post" => $slug,
                    "language" => $language,
                ]);
            } else {

                $page = $language
                    ->pages()
                    ->where("slug", end($slug_parts) ?: "/")
                    ->firstOrFail();
            }
        } else {
            if (
                !strpos($slug, "/") &&
                \App\Models\Post::where("slug", $slug)->first()
            ) {
                return redirect()->route("post.show", [
                    "post" => $slug,
                ]);
            }
            // This allows old URLs for podcasts to work.
            elseif (
                !strpos($slug, "/") &&
                \App\Models\Podcast::where("slug", $slug)->first()
            ) {
                $language = \App\Models\Podcast::where("slug", $slug)->first()
                    ->language;
                return redirect()->route("language.podcast.show", [
                    "podcast" => $slug,
                    "language" => $language,
                ]);
            } else {
                $page = Page::doesntHave("language")
                    ->where("slug", end($slug_parts) ?: "/")
                    ->firstOrFail();
            }
        }

        if (
            count($slug_parts) > 1 &&
            $page->parent->slug != $slug_parts[count($slug_parts) - 2]
        ) {
            abort(404);
        }

        if ($page->redirect) {

            if (!$page->redirect_override_enabled || (!isset($_GET['preview']) || ($_GET['preview'] !== dechex($page->id * 4001)))) {
                return redirect()->to($page->redirect);
            }
        }


        return view("templates." . (new $page->template())->name(), [
            "page" => $page->resolveContent(),
            "language" => $language,
        ]);
    }
}
