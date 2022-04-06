<?php

namespace App\Http\Livewire;

use App\Models\Commande;
use App\Models\CommandeType;
use Livewire\Component;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\TimeColumn;

class ShowCommandes extends LivewireDatatable
{
    public $model = CommandeType::class;


    public function columns()
    {
        return [
            Column::name('commande.id')->label('id commande')->alignCenter(),
            Column::name('type.title')->alignCenter(),
            Column::name('quantite')->alignCenter(),
            Column::name('observation')->alignCenter(),
            DateColumn::name('commande.created_at')->alignCenter(),
            Column::callback(['commande.created_at'], function ($created_at) {
                return date('h:i:s',strtotime($created_at));
             })->label('Heure création')->alignCenter(),
            Column::callback(['commande.id'], function ($id) {
                return view('commandes.table-actions', ['id' => $id]);
            })->unsortable()

        ];
    }
}
