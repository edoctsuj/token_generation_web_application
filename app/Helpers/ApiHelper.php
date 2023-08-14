<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiHelper
{
    public static function httpGet($url)
    {
        try {
            $response = Http::get(env('API_URL') . $url);

            return $response->json();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function httpPost($url, $data)
    {
        try {
            $response = Http::post(env('API_URL') . $url, $data);

            return $response->json();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
