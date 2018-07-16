<?php

namespace App\Http\Middleware;

use Closure;

class DeniedIfNotStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (\Auth::guard('staff_user')->check() || \Auth::guard('admin_user')->check()) {
            return $next($request);
        }
            abort(404);
    }
    
}
