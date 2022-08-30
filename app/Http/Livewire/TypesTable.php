<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TypesTable extends LivewireDatatable
{
    public $beforeTableSlot="types.insertion";

    public $type;
    public $title;


    public $model = Type::class;
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label(__('ID'))
                ->width(20)
                ->alignCenter(),

           Column::name('title')
                ->label(__('Type'))
                ->filterable(),
           Column::callback(['id'], function ($id) {
                    return view('types.table-actions', ['id' => $id]);
                })->unsortable()
            ];
    }
    public function edit($id){
        $this->type=Type::find($id);
        $this->title=$this->type->title;
    }
    public function save(){
        $this->validate([
            'title' => 'required|unique:types',
        ]);

        Type::create(['title'=>$this->title]);

        session()->flash('message', 'Ajout avec succès.');
        $this->resetP();
    }

    public function update(){
        $this->validate([
            'title' => 'required|unique:types,title,'.$this->type->id.',id'
        ]);

        $this->type->update(['title'=>$this->title]);

        session()->flash('message', 'Modifié avec succès.');
        $this->resetP();
    }
    public function resetP(){

        $this->type=null;
        $this->title=null;
    }
}
