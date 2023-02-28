<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $api = 'http://localhost:8000/api/';

    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            $this->api.'user/'. session('id_user')
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('news.index', [
            "data" => $data,
            "page" => 'user'
        ]);
    }
}
