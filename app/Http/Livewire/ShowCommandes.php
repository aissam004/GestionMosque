<?php

namespace App\Http\Livewire;

use App\Models\CommandeType;
use App\Models\Type;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

class ShowCommandes extends LivewireDatatable
{
    public $model = CommandeType::class;


    public function columns()
    {
        return [
            NumberColumn::name('commande.id')
            ->label("#")
            ->alignCenter(),
            DateColumn::name('commande.created_at')
            ->label(__('Date création'))
            ->alignCenter()
            ->filterable(),

            Column::name('type.title')
                ->label(__('Type'))
                ->alignCenter()
                ->filterable(Type::pluck('title')),

            NumberColumn::name('quantite')
                ->label(__('quantite'))
                ->alignCenter(),
            NumberColumn::name('quantite_attribue')
                ->label(__('quantite attribué')),
                Column::callback(['commande_type.id'], function ($id) {
                    return view('table-actions', ['id' => $id,'racine'=>'commandes']);
                })->unsortable()



        ];
    }
   

}
