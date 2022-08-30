<?php

namespace App\Http\Livewire;

use App\Models\Boite;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
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
                        DateColumn::name('created_at')
            ->label('Date création')
            ->hide()
            ->alignCenter()
            ->excludeFromExport(),
            Column::callback(['created_at'], function ($created_at) {
                return date('h:i:s',strtotime($created_at));
             })->label('Heure création')
             ->hide()
             ->alignCenter()
             ->excludeFromExport(),
            Column::callback(['id'], function ($id) {
                            return view('boites.table-actions', ['id' => $id]);
                        })->unsortable()->excludeFromExport()


        ];
    }
}
