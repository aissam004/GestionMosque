<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PositionsTable extends LivewireDatatable
{
    public $beforeTableSlot="positions.insertion";

    public $position;
    public $name;


    public $model = Position::class;
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label(__('ID'))
                ->width(20)
                ->alignCenter(),

           Column::name('name')
                ->label(__('Position'))
                ->filterable(),
           Column::callback(['id'], function ($id) {
                    return view('positions.table-actions', ['id' => $id]);
                })->unsortable()
            ];
    }
    public function edit($id){
        $this->position=Position::find($id);
        $this->name=$this->position->name;
    }
    public function save(){
        $this->validate([
            'name' => 'required|unique:positions',
        ]);

        Position::create(['name'=>$this->name]);

        session()->flash('message', 'Ajout avec succès.');
        $this->resetP();
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:positions,name,'.$this->position->id.',id'
        ]);

        $this->position->update(['name'=>$this->name]);

        session()->flash('message', 'Modifié avec succès.');
        $this->resetP();
    }
    public function resetP(){

        $this->position=null;
        $this->name=null;
    }
}
