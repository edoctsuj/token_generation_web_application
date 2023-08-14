<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiHelper
{
    public function httpGet($url)
    {
        try {
            $response = Http::get(env('API_URL') . $url);

            return $response->json();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function httpPost($url, $data)
    {
        try {
            $response = Http::post(env('API_URL') . $url, $data);

            return $response->json();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
