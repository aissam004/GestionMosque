<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    public function materiels(){
        return $this->hasMany(Materiel::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function marque(){
        return $this->belongsTo(Marque::class);
    }
}
