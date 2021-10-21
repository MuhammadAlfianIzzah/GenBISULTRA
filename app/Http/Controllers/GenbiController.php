<?php

namespace App\Http\Controllers;

use App\Models\penerimaBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenbiController extends Controller
{
    public function show()
    {
        return view("page.genbi.daftar");
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                "foto_pengenal" => "mimes:png,jpg"
            ]
        );
        $request->file("foto_pengenal")->store("/penerimaB");
    }
}
