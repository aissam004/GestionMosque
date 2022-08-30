<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function personne(){
        return $this->belongsTo(Personne::class);
    }
    public function scopeIncomes($query)
    {
        return $query->where('isincome', true);
    }
    public function scopeDepenses($query)
    {
        return $query->where('isincome', false);
    }
}
