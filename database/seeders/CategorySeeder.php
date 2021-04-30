<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([

            'libelle'=>'Materiels electroniques',

            'description'=>'Ceci est la description de materiel electronique'
        ]);

        Category::create([

            'libelle'=>'Vetements',

            'description'=>'Ceci est la description de vetements'
        ]);

        Category::create([

            'libelle'=>'Cosmetique',

            'description'=>'Ceci est la description de cosmetique'
        ]);
    }
}
