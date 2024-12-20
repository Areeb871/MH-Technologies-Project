<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        $user=$request->user();
        //dd($user);
        //pluck is fetch the name from database and passes to array
        $user_roles=$user->roles->pluck('name')->toArray();
       // dd($user_roles);
       //array_intersect means the datsabase and roles given in middleware matches then passes it 
if($user&&count(array_intersect($roles,$user_roles))>0)
{
        return $next($request);
    }
    return redirect()->back()->withError('Unauthorized');
}
}
