<?php namespace Anomaly\GroceriesModule\Http\Middleware;

use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
