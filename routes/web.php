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

Route::get("/", [\App\Http\Controllers\PageController::class, "home"])->name(
    "home"
);

Route::get("/posts/{post:slug}", [
    \App\Http\Controllers\PostController::class,
    "show",
])->name("post.show");

Route::get("/podcast/{podcast:slug}", [
    \App\Http\Controllers\PodcastController::class,
    "show",
])->name("podcast.show");

Route::get("/password/reset", function (Request $request) {
    return redirect("/nova/password/reset/" . $request->token);
})->name("password.reset");

Route::get("{page}", [\App\Http\Controllers\PageController::class, "show"])
    ->where("page", "^(?!nova).*")
    ->name("page.show");
