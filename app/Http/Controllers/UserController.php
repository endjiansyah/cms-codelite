<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            'user/'. session('id_user')
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('user.index', [
            "data" => $data,
            "page" => 'home'
        ]);
    }

    function update(Request $request)
    {
        // dd($request->input('password'));
        if(!$request->input('password')){
            return redirect()->back()->with(['error' => 'Password Kosong']);
        }

        if(strlen($request->input('password')) <6){
            return redirect()->back()->with(['error' => 'panjang password minimal 6 character']);
        }

        if( $request->input('password') != $request->input('kpassword')){
            return redirect()->back()->with(['error' => 'Password dan konfirmasi password berbeda']);
        }
        $payload = [
            "password" => $request->input("password"),
        ];
        

        $news = HttpClient::fetch(
            "POST",
            "user/".session('id_user') .'/edit',
            $payload,
        );

        return redirect()->back()->with(['successcp' => 'Password berubah']);
    }
}
