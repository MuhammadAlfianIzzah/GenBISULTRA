<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomPickerController extends Controller
{
    public function show()
    {
        return view("page.fitur.random_picker.show");
    }
}
