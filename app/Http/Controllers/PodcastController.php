<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;

class PodcastController extends Controller
{
    public static function show(Podcast $podcast)
    {
        return view("podcast.show", compact("podcast"));
    }
}
