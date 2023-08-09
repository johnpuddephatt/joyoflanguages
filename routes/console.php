<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command("fetch:wordpress", function () {
    dispatch(new \App\Jobs\FetchWordpress());
})->describe("Fetch Wordpress posts from uploaded XML");

Artisan::command("fetch:podcasts", function () {
    dispatch(new \App\Jobs\FetchPodcasts());
})->describe("Fetch Podcasts from RSS");
