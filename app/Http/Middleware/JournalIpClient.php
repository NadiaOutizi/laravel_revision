<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Log;

class JournalIpClient
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        Log::info('Client IP: ' . $ip);

        return $next($request);
    }
}
