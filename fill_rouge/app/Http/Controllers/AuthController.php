<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('sinup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|integer', // Assurez-vous que le champ de rôle est requis et de type entier
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Récupérez le rôle sélectionné
        $role = Role::find($request->role);

        // Attachez le rôle à l'utilisateur
        $user->roles()->attach($role);

        return redirect('/login')->with('success', 'Votre compte a été créé avec succès ! Vous pouvez vous connecter maintenant.');
    }
}
