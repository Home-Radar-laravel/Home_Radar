<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if (!auth()->user()->roles_name==["adminstrator"]) {
            return redirect()->route('dashboard-overview-1');

        }else{

            return redirect()->route('product-list');
        }

        return $next($request);
    }
}
