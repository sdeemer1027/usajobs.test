<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Impersonate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (auth()->user() && auth()->user()->hasRole('Admin')) {
            // Check if the user has the 'impersonate' permission (create this permission)
          //  if (auth()->user()->can('impersonate')) {
                return $next($request);
        //    }
        }

        abort(403, 'Unauthorized'); // Redirect or display an error as needed
    }
}
