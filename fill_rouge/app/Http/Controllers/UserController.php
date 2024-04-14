<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

   public function  indexRegistre(){
       return view('sinup');
   }
    public function register(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Utilisateur,Vendeur', // Vérifie que le rôle est soit "Utilisateur" soit "Vendeur"
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Récupération du rôle en fonction de ce qui a été choisi
        $role = Role::where('name', $request->role)->first();

        // Assignation du rôle à l'utilisateur dans la table users_roles
        $user->roles()->attach($role->id);

        // Redirection de l'utilisateur vers la page de connexion après l'enregistrement
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Veuillez vous connecter.');
    }


    public function login(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion de l'utilisateur
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Récupération de l'utilisateur authentifié
            $user = Auth::user();

            // Vérification du rôle de l'utilisateur
            if ($user->isAdmin()) {
                // Redirection vers le tableau de bord de l'administrateur
                return redirect()->route('Admin.dashboard');
            } elseif ($user->isVendor()) {
                // Redirection vers le tableau de bord du vendeur
                return redirect()->route('vendeur.dashbord');
            } elseif ($user->isUser()) {
                // Redirection vers la page d'accueil de l'utilisateur
                return redirect()->route('home');
            }
        }

        // Si l'authentification échoue, redirigez avec un message d'erreur
        return redirect()->back()->withInput()->withErrors(['email' => 'Les informations d\'identification fournies sont incorrectes.']);
    }


}
