<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Models\UrlShortened;
use App\Services\UrlShortenerService;

class UrlShortenerController extends Controller
{
    public function index()
    {
        // je stocke la variable ds le fichier de config()
        $urls = auth()->user()->urls()->paginate(config('app.pagination.urlshortener'));
        return view('url_shortener.index')->with('urls', $urls);
    }

    public function create()
    {
        return view('url_shortener.create');
    }

    public function store(UrlShortenerRequest $request, UrlShortenerService $urlShortenerService)
    {
        $data = $request->validated();

        if (isset($data['url'])) {
            //ce service ^permet de raccourcir l'url
           $data = $urlShortenerService->shortCut($data['url']);

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

    public function edit(UrlShortened $url)
    {
        return view('url_shortener.edit')->with('url', $url);
    }

    public function update(UrlShortenerRequest $request, UrlShortened $url, UrlShortenerService $urlShortenerService)
    {
        $data = $request->validated();
        // on vérifie si le user a bien cette url
        $userId = auth()->user()->id;

        if ($userId === $url->user_id) {
            try {
                $shortCutData = $urlShortenerService->shortCut($data['url']);
                $url->update($shortCutData);
                $url->save();

                return redirect()->back()->with('success', 'Vous avez mis à jour votre url');

            } catch (\Exception $e) {
                report($e);
                return redirect()->back()->withError('une erreur est survenue');
            }
        } else {
            return redirect()->back()->withErrors('vous ne passerez pas !!!');
        }
    }

    public function destroy(UrlShortened $url)
    {
        $userId = auth()->user()->id;
        if ($userId === $url->user_id) {
            $url->delete();
            return redirect()->back()->with('success', 'Vous avez supprimer l\'url brutalement sans sommation, ainsi va la vie pour ce test ^^');
        } else {
            return redirect()->back()->withErrors('vous ne passerez pas !!!');
        }
    }
}
