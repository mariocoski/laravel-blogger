<?php

namespace App\Http\Middleware;

use Closure;

class Role
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (auth()->guest() || !auth()->user()->hasRole($role)) {
            return redirect()->to('login');
        }

        return $next($request);
    }
}
