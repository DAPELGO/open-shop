<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use App\Mail\AjoutProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NouveauProduit;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperer la liste de tous produits
        $produits = Produit::all();

        
        $produits = Produit::orderByDesc('id')->paginate(15);

        //recuperer un nb definit de produit(afficher les produits par lot de 15)

        $produits = Produit::paginate(15);

        return view('front-office/produits/index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recuperer la liste des categories et affecter a select
        $categories = Category::all();
        $produit = new Produit(); 
        return view('front-office.produits.create', compact('categories', 'produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {          
        //dd($request->category_id, $request->designation, $request->prix); oubien
        //dd($request->designation);
        $imageName = 'produit.png';
        if($request->file('image')){
            $imageName = time()."_".$request->file('image')->getClientOriginalName();
            //uploader un fichier et le stocker dans public/produits
            $request->file('image')->storeAs('public/produits',$imageName);
        }
        
        $produit = Produit::create([
            "designation"=> $request->designation,
            "prix"=> $request->prix,            
            "category_id" => $request->category_id,
            "quantite" => $request->quantite,
            "description" => $request->description,
            "image"=>$imageName            
        ]);

        $user = User::first();
        Mail::to($user)->send(new AjoutProduit($produit));

        return redirect()->route('produits.show', $produit)->with('statut', 'Votre nouveau produit a ete bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //retourner la vue avec le produit
        
        $produit=Produit::where('id',$id)->first();

        return view('front-office.produits.show', compact('produit'));
        //Afficher un produit
        


    }*/

    public function show(Produit $produit)
    {
        //retourner la vue avec le produit       
       
        return view('front-office.produits.show', compact('produit'));
        //Afficher un produit

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {

        $categories = Category::all();
        
        return view('front-office.produits.edit',compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitformRequest $request, $id)
    {
        //le update intervient apres la modification d'un element
        $produit = Produit::find($id);
        $produit->update([

            "designation"=>$request->designation,

            "prix"=>$request->prix,

            "quantite"=>$request->quantite,

            "description"=>$request->description
        ]);
        
        $user = User::first();
        $user->notify(new NouveauProduit($produit));
        return redirect()->route('produits.show', $id)->with('statut', 'Enregistrement effectué avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Produit::destroy($id);

        return redirect()->route('produits.index')->with('statut', 'Enregistrement supprimé avec succes!');
    }
}
