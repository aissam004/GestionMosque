<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function transactions(){
        return $this->hasMany(Transaction::class);
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
