<?php

namespace App\Http\Livewire;

use App\Models\Marque;
use App\Models\Modele;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Modeles extends Component
{
    public $marques=[];
    public $types=[];
    public $modeles;
    public $marque_id;
    public $type_id;
    public $modele_id;
    

    public function render()
    {
        $this->marques = Marque::all();
        $this->types=Type::all();

        $this->modeles=Modele::marqueAndType($this->marque_id,$this->type_id)->get();

        return view('livewire.modeles');
    }


}
