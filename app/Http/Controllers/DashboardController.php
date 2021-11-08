<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        // Auth::user()->attachRole("admin");
        $users = User::paginate(5)->fragment('users');
        return view('dashboard', compact("users"));
    }
}
