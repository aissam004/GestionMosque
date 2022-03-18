<?php

namespace App\Http\Livewire;

use App\Models\Marque;
use Livewire\Component;
use App\Models\Materiel;
use App\Models\Type;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ShowMateriels extends LivewireDatatable
{
    public $model = Materiel::class;
    public $serialNumberEditable=0;
    public $beforeTableSlot="livewire.switch";

    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter(),
            Column::name('modele.type.title')
                ->label(__('Type'))
                ->alignCenter()
                ->filterable(Type::pluck('title')),
            Column::name('serialnumber')
                ->alignCenter()
                ->label(__('N° de série'))
                ->filterable()
                ->editable($this->serialNumberEditable),
            Column::name('modele.title')
                ->alignCenter()
                ->label(__('Modèle'))
                ->filterable()
                ->searchable(),
            Column::name('modele.marque.name')
                ->alignCenter()
                ->label(__('Marque'))
                ->filterable(Marque::pluck('name')),
            Column::callback(['id'], function ($id) {
                return view('table-actions', ['id' => $id]);
            })->unsortable()

        ];
    }

}
