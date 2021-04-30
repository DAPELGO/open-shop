<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //public $fillable = ['libelle', 'description'];
    use HasFactory;

    public function produits()
    {
        //une categorie comporte plusieurs produits

        return $this->hasMany(Produit::class);



    }


}
