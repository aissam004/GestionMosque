<?php

namespace App\Http\Livewire;

use App\Models\Marque;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MarquesTable extends LivewireDatatable
{
    public $beforeTableSlot="marques.insertion";

    public $marque;
    public $name;


    public $model = Marque::class;
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label(__('ID'))
                ->width(20)
                ->alignCenter(),

           Column::name('name')
                ->label(__('Marque'))
                ->filterable(),
           Column::callback(['id'], function ($id) {
                    return view('marques.table-actions', ['id' => $id]);
                })->unsortable()
            ];
    }
    public function edit($id){
        $this->marque=Marque::find($id);
        $this->name=$this->marque->name;
    }
    public function save(){
        $this->validate([
            'name' => 'required|unique:marques',
        ]);

        Marque::create(['name'=>$this->name]);

        session()->flash('message', 'Ajout avec succès.');
        $this->resetP();
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:marques,name,'.$this->marque->id.',id'
        ]);

        $this->marque->update(['name'=>$this->name]);

        session()->flash('message', 'Modifié avec succès.');
        $this->resetP();
    }
    public function resetP(){

        $this->marque=null;
        $this->name=null;
    }
}
