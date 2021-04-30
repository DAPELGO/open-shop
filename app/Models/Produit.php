<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public $fillable = ['designation', 'prix', 'description', 'quantite', 'category_id', 'image'];

    use HasFactory;

    //methode permettant le faire un lien avec la category(un produit appartient a une cat donc belongsTo)

    public function category()
    {
        return $this->belongsTo(Category::class);


    }

    public function users()
    {
        //belongstomany pour une relation de plusieurs a plusieurs

        return $this->belongsToMany(User::class);
    }
}
