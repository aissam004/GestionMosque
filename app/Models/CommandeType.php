<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeType extends Model
{
    use HasFactory;
    protected $table = 'commande_type';
    public function commande(){
        return $this->belongsTo(Commande::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
