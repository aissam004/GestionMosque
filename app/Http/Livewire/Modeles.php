<?php

namespace App\Http\Livewire;

use App\Models\Marque;
use App\Models\Modele;
use App\Models\Type;
use Livewire\Component;

class Modeles extends Component
{
    public $modeles=[];
    public $marques=[];
    public $types=[];
    public $type1="";
    public $ddd="";
    protected $listeners = ['hello' => 'hello'];
    public function render()
    {
        $this->modeles=Modele::all();
        $this->marques = Marque::all();
        $this->types=Type::all();


        return view('livewire.modeles');
    }


}
