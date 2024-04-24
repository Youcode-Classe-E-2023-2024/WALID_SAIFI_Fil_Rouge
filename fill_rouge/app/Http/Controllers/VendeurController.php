<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;

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

    public function index()
    {

        $user = Auth::user();

        $numberOfProducts = Product::where('user_id', $user->id)->count();

        return view('vendeur.dashVendeur', compact('numberOfProducts'));
    }



    public function indexAchat()
    {

        $achats = Achat::with('product')->where('prix_total', '>', 0)->get();


        return view('vendeur.listachat', compact('achats'));
    }



    public function validerAchatProduit($id)
    {
        // dd($id);
        $achat = Achat::findOrFail($id);
        $achat->prix_total = -1;//! ila chnger pa cette code ne foction pas
        $achat->save();
         //  dd($achat);
        return redirect()->route('achats.index')->with('success', 'L\'achat a été validé avec succès.');

    }








}
