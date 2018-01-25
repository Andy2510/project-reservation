<?php

namespace App\Http\Middleware;
// namespace App\Http\Controllers\Auth;

use Auth;
use Closure;

class IsAdmin
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
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
          return $next($request);

        }
          return redirect ('index');
    }
}
