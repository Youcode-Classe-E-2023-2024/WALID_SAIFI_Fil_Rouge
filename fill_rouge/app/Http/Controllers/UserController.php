<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Utilisateur,Vendeur', // Vérifie que le rôle est soit "Utilisateur" soit "Vendeur"
        ]);

        // Création de l'utilisateur
        $user = User::create([
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

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();


            if ($user->isAdmin()) {

                return redirect()->route('Admin.dashboard');

            } elseif ($user->isVendor()) {
                if ($user->validation == 1) {
                    return redirect()->route('vendor.dashboard');
                } else {
                    return redirect()->back()->withInput()->withErrors(['email' => 'Le compte n\'a pas encore été validé. Veuillez attendre la validation.']);
                }
            }elseif ($user->isUser()) {

                return redirect()->route('home');
            }
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Les informations d\'identification fournies sont incorrectes.']);
    }


    public function deconnecter(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }






    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }


        if ($request->file('img')) {
            $file = $request->file('img');
            @unlink(public_path('/images/' . $user->image)); // delete previous photo
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $user['image'] = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès!');
    }




    public function sendMessage(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Votre message a été envoyé. Merci !');

    }

    public function indexMessage()
    {
        $messages = Message::all();

        return view('Admin.message', compact('messages'));
    }


    public function deleteMessage($id)
    {
        $message = Message::findOrFail($id); // Recherche du message par son ID
        $message->delete(); // Suppression du message
        return redirect()->back()->with('success', 'Le message a été supprimé avec succès.');
    }


}
