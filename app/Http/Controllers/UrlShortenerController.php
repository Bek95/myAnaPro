<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('url_shortener.index');
    }

    public function create()
    {
        return view('url_shortener.create');
    }
}
