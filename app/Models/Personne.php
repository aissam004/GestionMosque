<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function incomes(){
        return $this->hasMany(Transaction::class)->incomes();
    }
    public function depenses()
    {
        return $this->hasMany(Transaction::class)->depenses();
    }


}
