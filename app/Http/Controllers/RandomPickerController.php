<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class RandomPickerController extends Controller
{
    public function show()
    {
        SEOMeta::setTitle("Aplikasi GenBI SULTRA");
        OpenGraph::addProperty('type', 'APPLIKASI RANDOM PICKER');
        return view("page.fitur.random_picker.show");
    }
}
