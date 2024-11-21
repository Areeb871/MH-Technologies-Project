<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminIdMiddleware
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
        if (Auth::check()) {
            // Check if the user ID is 1 (or any admin's ID)
            if (Auth::user()->id == 1) {  // Replace 1 with the correct admin ID
                return $next($request);  // Allow access to the dashboard
            } else {
                return redirect('/'); // Redirect if the user is not an admin
            }
        }
        return redirect('/login'); // Redire
    }
       
        // Check if the user is authenticated
       
}
