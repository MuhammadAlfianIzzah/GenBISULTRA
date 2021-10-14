<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BrainPost;
use App\Models\Devisi;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function show()
    {
        $kegiatan = Activity::get();
        $posts = BrainPost::limit(5)->where("approval", "accept")->get();
        $devisi = Devisi::get();
        return view('welcome', compact("kegiatan", "posts", "devisi"));
    }
    public function author()
    {
        return view("page.author");
    }
}
