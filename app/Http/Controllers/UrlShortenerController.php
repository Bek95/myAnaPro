<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use Illuminate\Support\Facades\Auth;

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

    public function store(UrlShortenerRequest $request)
    {


        $url = $request->validated();
        $shortCut = crypt($url, time());


    }
}
