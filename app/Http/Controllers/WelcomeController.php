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
        $client = new Client();
        $dataCovid = json_decode($client->request("GET", "https://data.covid19.go.id/public/api/prov.json", [
            'verify'  => false,
        ])->getBody());

        $kegiatan = Activity::get();
        $posts = BrainPost::limit(5)->where("approval", "accept")->get();
        $devisi = Devisi::get();
        // dd(Carbon::parse($dataCovid->last_date)->diffForHumans());
        return view('welcome', compact("kegiatan", "posts", "devisi", "dataCovid"));
    }
    public function author()
    {
        return view("page.author");
    }
}
