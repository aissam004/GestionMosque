<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function modeles(){
        return $this->hasMany(Modele::class);
    }
    public function commandes(){
        return $this->belongsToMany(Commande::class)->withPivot('quantite','quantite_attribue');
    }
}
