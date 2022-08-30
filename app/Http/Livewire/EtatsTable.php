<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class EtatsTable extends LivewireDatatable
{
    public $beforeTableSlot="etats.insertion";

    public $etat;
    public $title;


    public $model = Etat::class;
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label(__('ID'))
                ->width(20)
                ->alignCenter(),

           Column::name('title')
                ->label(__('Etat'))
                ->filterable(),
           Column::callback(['id'], function ($id) {
                    return view('etats.table-actions', ['id' => $id]);
                })->unsortable()
            ];
    }
    public function edit($id){
        $this->etat=Etat::find($id);
        $this->title=$this->etat->title;
    }
    public function save(){
        $this->validate([
            'title' => 'required|unique:etats',
        ]);

        Etat::create(['title'=>$this->title]);

        session()->flash('message', 'Ajout avec succès.');
        $this->resetP();
    }

    public function update(){
        $this->validate([
            'title' => 'required|unique:etats,title,'.$this->etat->id.',id'
        ]);

        $this->etat->update(['title'=>$this->title]);

        session()->flash('message', 'Modifié avec succès.');
        $this->resetP();
    }
    public function resetP(){

        $this->etat=null;
        $this->title=null;
    }
}
