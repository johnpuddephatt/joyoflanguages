<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;

class PodcastController extends Controller
{
    public static function show(Language $language = null, Podcast $podcast)
    {
        return view("podcast.show", compact("podcast"));
    }

    public static function audio(Language $language = null, Podcast $podcast)
    {

        return Cache::remember('users', 600, function () use ($podcast) {
            $string = file_get_contents($podcast->file);
            header("Content-Type: audio/mpeg");
            header("Content-length: " . strlen($string));
            header("Connection: keep-alive");
            header("Accept-Ranges: bytes ");
            echo $string;
        });
    }
}
