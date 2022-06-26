<?php

namespace App\Http\Livewire;

use App\Models\Boite;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class IndexBoites extends LivewireDatatable
{
    public $model = Boite::class;


    public function columns()
    {
        return [

            NumberColumn::name('id')->alignCenter(),
            NumberColumn::name('numero')->alignCenter(),
            Column::name('titre')->alignCenter(),
            NumberColumn::name('documents.id:count')
                        ->label('Nombre de documents')
                        ->alignCenter(),
            Column::callback(['id'], function ($id) {
                            return view('boites.table-actions', ['id' => $id]);
                        })->unsortable()


        ];
    }
}
