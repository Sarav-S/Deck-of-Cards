<?php

namespace App\Http\Middleware;

use Closure;

class ClassicUser
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

        if (!auth()->user()->hasRole('user')) {
            flash()->error("Permission denied. User restricted pages.");
            return redirect()->to('/');
        }

        return $next($request);
    }
}
