<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Role;
use App\Models\User;

class MainController extends Controller
{
    public function accueil()
    {
        $users = User::orderByDesc('id')->first();

        //dd($user);
        // dd($users->isAdmin());
        //pour afficher les 9 derniers produits
        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' =>$produits]);
    }
}
