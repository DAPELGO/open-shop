<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //un user peut commander plusieurs produits

    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //fonction pour voir si l'utilisateur est un admin ou pas

    public function isAdmin()
    {
        if($this->role->profil=='super-admin' OR $this->role->profil=='admin')
        {
            return true;
        }        
        else
        {
            return false;
        } 
        //return ($this->profil == 'super-admin' or $this->profil=='admin');
        
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }
}
