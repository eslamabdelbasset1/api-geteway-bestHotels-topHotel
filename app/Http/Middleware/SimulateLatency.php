<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;

class SimulateLatency
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws RandomException
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Introduce a delay of 2 seconds (adjust as needed)
//        $randomDelay = rand(1000000, 5000000);
        $randomDelay = random_int(1000000, 5000000);
        usleep($randomDelay); // Introduce a random delay

        return $next($request);
    }
}
