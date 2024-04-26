<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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

        $userId = Auth::id();

        $nombreTotalProduitsVus = Product::where('user_id', $userId)->sum('views');
        $nombreTotalProduits   = Product::where('user_id', $userId)->count();
        //dd($nombreTotalProduitsVus);
        //dd($nombreTotalProduits);


        $sommeTotalePrixAchats = Achat::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->sum('prix_total');
        $dateAujourdhui = Carbon::now()->format('d/m/Y');

        return view('vendeur.dashVendeur', compact('nombreTotalProduitsVus' , 'nombreTotalProduits','sommeTotalePrixAchats','dateAujourdhui'));
    }






    public function indexAchat()
    {

        $achats = Achat::with('product')->where('validation', '=', 0)->get();


        return view('vendeur.listachat', compact('achats'));
    }



    public function validerAchatProduit($id)
    {
        // dd($id);
        $achat = Achat::findOrFail($id);
        $achat->validation = -1;//!
        $achat->save();
         //  dd($achat);
        return redirect()->route('achats.index')->with('success', 'L\'achat a été validé avec succès.');

    }










}
