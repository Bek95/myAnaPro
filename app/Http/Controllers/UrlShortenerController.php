<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Services\UrlShortenerService;

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

    public function store(UrlShortenerRequest $request, UrlShortenerService $urlShortenerService)
    {
        $data = $request->validated();

        if (isset($data['url'])) {
            //get url from
            $url = $data['url'];
            $shortCut = crypt($url, time());
           // parse url to get url sheme and the host
            $sheme = parse_url($url, PHP_URL_SCHEME);
            $host = parse_url($url, PHP_URL_HOST);

            $urlShortcut = $sheme . '://' . $host . '/' . $shortCut;

            $userId = \auth()->user()->id;

            $data = [
                'url' => $url,
                'url_shortcut' => $urlShortcut,
                'user_id' => $userId,
            ];

            try {

                $res = $urlShortenerService->create($data);

                if ($res) {
                    return redirect()->back()->with('success', 'Vous avez raccourci votre url');
                }

            } catch (\Exception $e) {
                report($e);

                return redirect()->back()->withError('une erreur est survenue');
            }
        }
        return redirect()->back()->withError('pas d\'url de saisie');

    }
}
