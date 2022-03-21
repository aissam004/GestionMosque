<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function types(){
       return $this->belongsToMany(Type::class)->withPivot('quantite','quantite_attribue','observation');
    }
    public function attributions(){
        return $this->belongsToMany(Attribution::class)->withPivot('observation');
    }
}
