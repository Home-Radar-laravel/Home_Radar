<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedWithRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect based on user role
            if ($user->role === 'client') {
                return redirect()->route('home');
            } elseif ($user->role === 'renter') {
                return redirect()->route('dashboard.add-listing');
            }

            // If the role is not matched, proceed with the request
        }

        return $next($request);
    }
}
