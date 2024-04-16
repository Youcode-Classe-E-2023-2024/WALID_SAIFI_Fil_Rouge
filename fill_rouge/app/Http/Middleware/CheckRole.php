<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {

            if (Auth::user()->isAdmin()) {

                return $next($request);
            }
        }

        return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette ressource.');
    }
}
