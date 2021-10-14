<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userProfile()
    {
        // Auth::user()->attachRole('admin');
        $users = User::all();
        $user_id = request()->user()->id;
        $profile = Profile::where("user_id", $user_id)->first();
        $posts = Posts::where("user_id", Auth::user()->id)->latest()->get();
        return view("page.user.profile", compact("users", "profile", "posts"));
    }
}
