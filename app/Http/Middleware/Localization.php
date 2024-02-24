<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ako postoji u sesiji locale. onda setuuj vrednost i nastavi putanjom kojom si dosao itako smo presreli sve zahteve
        if(Session::exists('locale')){
            App::setLocale(session('locale'));
        }
        return $next($request);
    }
}
