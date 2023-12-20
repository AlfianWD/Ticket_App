<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthNomorAntrian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if(session('Antrian_button_click')) {
            return redirect('/')->with('message', 'You need to get antrian first.');
        }

        return $next($request);
    }
}
