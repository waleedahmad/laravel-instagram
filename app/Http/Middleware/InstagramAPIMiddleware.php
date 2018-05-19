<?php

namespace App\Http\Middleware;

use App\Facades\Instagram;
use Closure;
use Illuminate\Support\Facades\Auth;

class InstagramAPIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->instagram){
            Instagram::setAccessToken(Auth::user()->instagram->access_token);
        }
        return $next($request);
    }
}
