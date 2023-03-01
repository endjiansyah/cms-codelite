<?php

namespace App\Http\Middleware;

use App\Helpers\HttpClient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotLogin
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
                "http://localhost:8000/api/me"
            );
            if(!$auth['status']) {
                session()->flush();
                return redirect("/");
            }
        } else {
            return redirect("/");
        }
        return $next($request);
    }
}
