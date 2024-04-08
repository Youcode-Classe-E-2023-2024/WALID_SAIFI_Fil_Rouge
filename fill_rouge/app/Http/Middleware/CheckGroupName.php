<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class CheckGroupName
{
    public function handle($request, Closure $next)
    {

        $group = Group::where('name', 'Admin')->first();

        if (!$group) {
            // Si le groupe n'existe pas, retourne une réponse d'erreur
            return response()->json(['error' => 'Le groupe Admin n\'existe pas'], 404);
        }

        return $next($request);
    }
}
