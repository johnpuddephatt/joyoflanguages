<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;

class UserController extends Controller
{
    public static function show(Language $language = null, User $user)
    {


        abort_if(!$user->show_in_staff_directory, 404, "Teacher not found");

        return view("user.show", compact("user"));
    }
}
