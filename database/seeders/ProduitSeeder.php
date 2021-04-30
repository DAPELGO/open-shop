<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::factory(500)->create();
        
       /* $produit = Produit::create([

            'designation' => "Portable",

            'description' =>"portable pour femme",

            'prix'=>10000,

            'quantite' => 30
        ]);

        Produit::create([

            'designation' => "Savon",

            'description' =>"savon a vendre",

            'prix'=>100000,
            
            'quantite' => 20
        ]);*/
    }
}
