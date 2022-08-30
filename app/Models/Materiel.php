<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function etat(){
        return $this->belongsTo(Etat::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function marque(){
        return $this->belongsTo(Marque::class);
    }
}
