<?php

namespace App\Services;

use App\Models\UrlShortened;

class UrlShortenerService
{

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
