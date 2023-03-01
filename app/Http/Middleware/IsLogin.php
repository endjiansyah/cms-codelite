<?php

namespace App\Http\Middleware;

use App\Helpers\HttpClient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('token') != null) {
            $auth = HttpClient::fetch(
                "GET",
                "me"
            );
            if($auth['status']) {
                return redirect("/admin");
            }else{
                session()->flush();
            }
        }
        return $next($request);
    }
}
