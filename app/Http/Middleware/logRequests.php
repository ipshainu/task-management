<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class logRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->is('login') && $request->isMethod('post')) {
            if (Auth::check()) {
            Log::info('User logged in: ' . Auth::user()->email);
            }
        }

        if ($request->is('logout') && $request->isMethod('post')) {
            Log::info('User logged out');
        }
        
        return $response;
    }
}
