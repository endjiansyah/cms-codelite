<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $api = 'http://localhost:8000/api/';
    public function logout()
    {
        HttpClient::fetch(
            "GET",
            $this->api."logout"
        );
        session()->flush();
        return redirect('/login');
    }
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('login');
        }
        $email = $request->email;
        $password = $request->password;

        $payload = [
            'email' => $email,
            'password' => $password,
        ];

        $auth = HttpClient::fetch(
            "POST",
            $this->api."login",
            $payload,
        );

        if (!session()->isStarted()) {
            session()->start();
        }

        if ($auth['status'] == false) {
            return redirect('/login')->with('error', $auth['message']);
        }


        $token = $auth['data']['auth']['token'];
        $token_type = $auth['data']['auth']['token_type'];
        session()->put("token", "$token_type $token");

        session()->put("id_user", $auth['data']['user']['id']);
        session()->put("nama_user", $auth['data']['user']['name']);
        // dd($payload,$auth,session('id_user'));

        return redirect('/admin');
        
    }
    public function pagelogin()
    {
        return view('login', [
            "page" => 'home'
        ]);
    }
}
