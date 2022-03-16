<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function modele(){
        return $this->belongsTo(Modele::class);
    }
    public function attribution(){
        return $this->belongsTo(Attribution::class);
    }
    public function etat(){
        return $this->belongsTo(Etat::class);
    }
    
}
