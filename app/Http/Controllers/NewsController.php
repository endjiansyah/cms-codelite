<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $api = 'http://localhost:8000/api/news/';

    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            $this->api
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('news.index', [
            "data" => $data,
            "page" => 'user'
        ]);
    }

    function list()
    {
        $responseData = HttpClient::fetch(
            "GET",
            $this->api
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('news.list', [
            "data" => $data,
            "page" => 'user'
        ]);
    }

    function detail($id)
    {
        // dd($this->api.$id);
        $responseData = HttpClient::fetch(
            "GET",
            $this->api.$id
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('news.detail', [
            "data" => $data,
            "page" => 'user'
        ]);
    }

    public function create()
    {
        return view("news.create");
    }

    function store(Request $request)
    {
        $payload = [
            "title" => $request->input("title"),
            "content" => $request->input("content"),
        ];
        if($request->file('banner')){
            $file = [
                "banner" => $request->file('banner')
            ];
        }else{
            $file = '';
        }

        $news = HttpClient::fetch(
            "POST",
            $this->api,
            $payload,
            $file
        );
        // dd($news,$news['message'],$payload,$file);

        return redirect()->back()->with(['success' => $news['message']]);
    }

    function edit($id)
    {
        // dd($this->api.$id);
        $responseData = HttpClient::fetch(
            "GET",
            $this->api.$id
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('news.edit', [
            "data" => $data,
            "page" => 'user'
        ]);
    }

    function update(Request $request, $id)
    {
        $payload = [
            "title" => $request->input("title"),
            "content" => $request->input("content"),
        ];
        if($request->file('banner')){
            $file = [
                "banner" => $request->file('banner')
            ];
        }else{
            $file = [];
        }
        $request->validate([
            "gambar" => 'mimes:jpg,jpeg,png',
        ]); 
        // dd($file);

        $news = HttpClient::fetch(
            "POST",
            $this->api . $id . "/edit",
            $payload,
            $file
        );

        return redirect()->back()->with(['success' => 'Data terupdate']);
    }

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            $this->api . $id . "/delete",
        );

        return redirect()->back()->with(['success' => 'Data terhapus']);
    }
}
