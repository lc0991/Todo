<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function showAbout()
    {
        return view('site/about/about');
    }
}
