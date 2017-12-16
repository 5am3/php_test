<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TrustRight
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
        $response =  $next($request);


        if ($request->getPathInfo() == '/getSecret') {
            if (Auth::check()) {
                $username = Auth::user()->username;
                if ($username == env('TEAM_NAME')) {
                    return $response;
                } else {
                    return redirect('/home');
                }
            }

        }
        return $response;
    }
}
