<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades;

class HttpClient
{

    static function fetch($method, $url, $body = [], $files = [])
    {
        $url = 'http://localhost:8000/api/'.$url; //local
        // $url = 'http://localhost:8000/api/'.$url; //deploy
        $headers = [];
        $token = session()->get("token", "");
        if ($token != "") {
            $headers["Authorization"] = $token;
        }

        if ($method == "GET") {
            return Http::withHeaders($headers)->get($url)->json();
        }
        if (sizeof($files) > 0) {
            $client = Http::asMultipart()->withHeaders($headers);

            foreach ($files as $key => $file) {
                $path = $file->getPathname();
                $name = $file->getClientOriginalName();
                $client->attach($key, file_get_contents($path), $name);
            }

            return $client->post($url, $body)->json();
        }

        //fetch api
        return Http::withHeaders($headers)->post($url, $body)->json();
    }
}
