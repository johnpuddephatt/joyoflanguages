<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(
    "{language:slug}." . parse_url(config("app.url"), PHP_URL_HOST)
)->group(function () {
    Route::get("posts/{post:slug}", [
        \App\Http\Controllers\PostController::class,
        "show",
    ])->name("language.post.show");

    Route::get("podcast/{podcast:slug}", [
        \App\Http\Controllers\PodcastController::class,
        "show",
    ])->name("language.podcast.show");

    Route::get("podcast/{podcast:slug}/audio", [
        \App\Http\Controllers\PodcastController::class,
        "audio",
    ])->name("language.podcast.audio");

    Route::get("{page}", [\App\Http\Controllers\PageController::class, "show"])
        ->where("page", "^(?!nova).*")
        ->name("language.page.show");
});

Route::get("posts/{post:slug}", [
    \App\Http\Controllers\PostController::class,
    "show",
])->name("post.show");

// Route::get("podcast/{podcast:slug}", [
//     \App\Http\Controllers\PodcastController::class,
//     "show",
// ])->name("podcast.show");

Route::get("password/reset", function (Request $request) {
    return redirect("/nova/password/reset/" . $request->token);
})->name("password.reset");

Route::get("team/{user:slug}", [
    \App\Http\Controllers\UserController::class,
    "show",
])->name("user.show");

Route::get("cookies", function () {
    return view("cookies");
})->name("cookies");

Route::get("brand", function () {
    return view("brand");
})->name("brand");

Route::get("{page}", [\App\Http\Controllers\PageController::class, "show"])
    ->where("page", "^(?!nova).*")
    ->name("page.show");
