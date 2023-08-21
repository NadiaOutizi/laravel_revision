<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $timeout = 5)
    {
        $lastActivity = $request->session()->get('lastActivity');

        if ($lastActivity && time() - $lastActivity > ($timeout * 60)) {
            $request->session()->flush();
            return redirect()->route('login')->with('error', 'Session timed out');
        }

        $request->session()->put('lastActivity', time());

        return $next($request);
    }
}
