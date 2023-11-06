<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckForSqlInjection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Check for SQL injection keywords
        if (preg_match('/\b(SELECT|UPDATE|DELETE|INSERT|UNION|DROP|ALTER)\b/i', $email.$password)) {
            // Log the potential SQL injection attempt
            Log::channel('customlog')->warning('Potential SQL Injection Attempt', [
                'ip' => $request->ip(),
                'email' => $email,
                'password' => $password,
                'date' => now()->toDateString(),
                'time' => now()->toTimeString()
            ]);
        }

        return $next($request);
    }
}
