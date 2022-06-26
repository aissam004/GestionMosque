<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function boite(){
        return $this->belongsTo(Boite::class);
    }
    public function nature(){
        return $this->belongsTo(Nature::class);
    }
    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }

    public function confidentialite(){
        return $this->belongsTo(Confidentialite::class);
    }
    public function structure(){
        return $this->belongsTo(Structure::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
