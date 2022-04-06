<?php

namespace App\Http\Livewire;

use App\Models\Commande;
use App\Models\CommandeType;
use App\Models\Type;
use Livewire\Component;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\ComplexQuery;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EditCommandes extends LivewireDatatable
{
    public Commande $commande;
    public $commande_id;
    public $types;
    public $afterTableSlot = "commandes.editForm";

    public $type_id;
    public $quantite;
    public $observation;

    public function builder()
    {
        $this->commande->refresh();
        $this->types=Type::all();

        $this->types=$this->types->diff($this->commande->types);

        return CommandeType::where('commande_id',$this->commande->id);
    }


    public function columns()
    {
        return [
            Column::name('type.title')->alignCenter(),
            Column::name('quantite')->alignCenter(),
            Column::name('observation')->alignCenter(),
            
            Column::delete()->alignCenter()
        ];
    }




    public function save(){

       $this->validate([
            'type_id' => 'required|exists:types,id',
            'quantite' => 'required|numeric|min:1',
        ]);

        $type=Type::find($this->type_id);

        $this->commande->types()->attach($this->type_id,['quantite'=>$this->quantite,'observation'=>$this->observation]);


        $this->types=Type::all();

        $this->commande->refresh();
        $this->types=$this->types->diff($this->commande->types);


        $this->type_id=null;
        $this->quantite=null;
        $this->observation=null;

    }

    public function delete($id){

        $this->commande->types()->detach(CommandeType::find($id)->type);
        $this->commande->refresh();
        $this->types=Type::all();
        $this->types=$this->types->diff($this->commande->types);
    }

}
