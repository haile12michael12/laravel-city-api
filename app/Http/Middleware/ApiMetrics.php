<?php

namespace App\Http\Middleware;

use Closure;

class ApiMetrics
{
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);
        
        $response = $next($request);
        
        $duration = microtime(true) - $startTime;
        
        // Log API request metrics
        error_log(sprintf(
            'API Request: %s %s - Duration: %.4f seconds - Status: %d',
            $request['method'] ?? 'GET',
            $request['path'] ?? '/',
            $duration,
            $response['status'] ?? 200
        ));

        return $response;
    }
}