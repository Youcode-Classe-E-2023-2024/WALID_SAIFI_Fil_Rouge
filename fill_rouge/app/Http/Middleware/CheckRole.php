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
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            // Vérifier si l'utilisateur a le rôle spécifié
            if (Auth::user()->isAdmin()) { // Utilisation de la méthode isAdmin
                // L'utilisateur a le rôle d'administrateur, donc autoriser la demande
                return $next($request);
            }
        }

        // Rediriger ou renvoyer une réponse en cas d'échec de l'autorisation
        return redirect()->route('login')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette ressource.');
    }
}
