<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    private $api_key;

    public function __construct()
    {
        $this->api_key = 'https://api.first.org/data/v1/countries';
    }

    public static function get_countries()
    {
        $response = Http::baseUrl('https://api.first.org')
            ->get('/data/v1/countries');
        return $response->json()['data'];
    }
}
