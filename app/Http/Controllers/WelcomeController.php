<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BrainPost;
use App\Models\Devisi;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function show()
    {
        $kegiatan = Activity::limit(5)->latest()->get();
        $posts = Posts::limit(5)->where("is_active", true)->latest()->get();

        return view('welcome', compact("kegiatan", "posts"));
    }
    public function author()
    {
        return view("page.author");
    }
}
