<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function indexVendeurNonValidesestValider()
    {
        $vendeursNonValides = User::whereHas('roles', function ($query) {
            $query->where('name', 'Vendeur');
        })->where('validation', 0)->get();

        $vendeursValides = User::whereHas('roles', function ($query) {
            $query->where('name', 'Vendeur');
        })->where('validation', 1)->get();

        return view('Admin.validation_user', compact('vendeursNonValides', 'vendeursValides'));
    }

    public function validerVendeur($id)
    {
        $vendeur = User::findOrFail($id);

        if ($vendeur->isVendor()) {
            $vendeur->validation = 1;
            $vendeur->save();
        }

        return redirect()->back()->with('success', 'Le vendeur a été validé avec succès.');
    }
    public function invaliderVendeur($id)
    {
        $vendeur = User::findOrFail($id);


        if ($vendeur->isVendor()) {
            $vendeur->validation = 0;
            $vendeur->save();
        }

        return redirect()->back()->with('success', 'Le vendeur a été invalidé avec succès.');
    }

}
