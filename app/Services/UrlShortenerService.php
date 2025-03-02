<?php

namespace App\Services;

use App\Models\UrlShortened;

class UrlShortenerService
{

    /**
     * @param string $url
     * @return array
     */
    public function shortCut(string $url): array
    {
        $shortCut = crypt($url, time());
        // parse url to get url sheme and the host
        $sheme = parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);
        $urlShortcut = $sheme . '://' . $host . '/' . $shortCut;
        $userId = \auth()->user()->id;

        return  [
            'url' => $url,
            'url_shortcut' => $urlShortcut,
            'user_id' => $userId,
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        if (!empty($data['url']) && !empty($data['url_shortcut']) && $data['user_id']) {

            $urlShortened = new UrlShortened();
            $urlShortened->url = $data['url'];
            $urlShortened->url_shortcut = $data['url_shortcut'];
            $urlShortened->user_id = $data['user_id'];

            return $urlShortened->save();

        } else {
            return false;
        }
    }

}
