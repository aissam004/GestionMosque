<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use App\Models\Marque;
use App\Models\Materiel;
use App\Models\Position;
use App\Models\Type;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\ComplexQuery;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\TimeColumn;

class IndexMateriels extends LivewireDatatable
{
    use WithFileUploads;


    public $afterTableSlot = "materiels.add-materiel";

    public ?Materiel $materiel = null;
    public $reference;
    public $date;
    public $observation;

    public $positions;
    public $position_id;

    public $marques;
    public $marque_id;


    public $types;
    public $type_id;

    public $etats;
    public $etat_id;
    public $model = Materiel::class;

    public function builder()
    {

        $this->positions=Position::all();
        $this->marques=Marque::all();
        $this->types=Type::all();
        $this->etats=Etat::all();


        return Materiel::query()
            ->leftJoin('etats', 'etats.id', 'materiels.etat_id')
            ->leftJoin('marques', 'marques.id', 'materiels.marque_id')
            ->leftJoin('positions', 'positions.id', 'materiels.position_id')
            ->leftJoin('types', 'types.id', 'materiels.type_id');
    }



    public function selectedItem($value)
    {
        dd($value);
    }

    public function columns()
    {
        return [
            //  Column::index($this),
            NumberColumn::name('id')
            ->label(__('ID'))
            ->alignCenter(),
            Column::name('reference')
                 ->label(__('Reference'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            Column::name('Type.title')
                ->label(__('Type'))
                ->filterable($this->type)
                ->alignCenter(),
            Column::name('Marque.name')
                ->label(__('Marque'))
                ->filterable($this->marque)
                ->alignCenter(),
            DateColumn::name('date')
                ->label(__('Date'))
                ->filterable()
                ->alignCenter(),

            Column::name('etat.title')
                ->label(__('Etat'))
                ->filterable($this->etat)
                ->alignCenter(),

            Column::name('position.name')
                ->label(__('Position'))
                ->filterable($this->position)
                ->alignCenter(),
            Column::name('observation')
            ->label(__('Observation'))
                ->filterable()
                ->alignCenter(),

            DateColumn::name('created_at')
                ->label(__('Date création'))
                ->hide()
                ->alignCenter()
                ->excludeFromExport(),
            TimeColumn::name('created_at AS Heure création')
                ->label(__('Heure création'))
                ->hide()
                ->alignCenter()
                ->excludeFromExport(),
            Column::callback(['id'], function ($id) {
                return view('materiels.table-actions', ['id' => $id]);
            })->unsortable()->excludeFromExport()
        ];
    }
    public function getEtatProperty()
    {
        return Etat::pluck('title');
    }
    public function getTypeProperty()
    {
        return Type::pluck('title');
    }
    public function getPositionProperty()
    {
        return Position::pluck('name');
    }
    public function getMarqueProperty()
    {
        return Marque::pluck('name');
    }


    public function saveMateriel()
    {


        $this->validate([
            'reference' => [ Rule::unique('materiels')->ignore($this->materiel ? $this->materiel->id : '')],
            'date' => 'nullable|date',
            'type_id' => 'required|nullable|exists:types,id',
            'etat_id' => 'nullable|exists:etats,id',
            'marque_id' => 'nullable|exists:marques,id',
            'position_id' => 'nullable|exists:positions,id',
            'observation'=>'nullable'

        ]);
        if ($this->materiel == null) {
            $this->materiel = Materiel::create(
                [
                    'reference' => $this->reference,
                    'date' => $this->date,
                    'type_id' => $this->type_id,
                    'etat_id' => $this->etat_id,
                    'marque_id' => $this->marque_id,
                    'position_id' => $this->position_id,
                    'observation'=>$this->observation
                ]
            );

        }


        $this->resetMateriel();

        session()->flash('message', 'Ajout avec succès.');
    }

    public function edit($id)
    {

        $this->materiel = Materiel::find($id);

        $this->reference=$this->materiel->reference;
        $this->date=$this->materiel->date;
        $this->type_id=$this->materiel->type_id;
        $this->etat_id=$this->materiel->etat_id;
        $this->marque_id=$this->materiel->marque_id;
        $this->position_id=$this->materiel->position_id;
        $this->observation=$this->materiel->observation;


    }
    public function updateMateriel()
    {
        $this->validate([
            'reference' => [ Rule::unique('materiels')->ignore($this->materiel ? $this->materiel->id : '')],
            'date' => 'nullable|date',
            'type_id' => 'required|nullable|exists:types,id',
            'etat_id' => 'nullable|exists:etats,id',
            'marque_id' => 'nullable|exists:marques,id',
            'position_id' => 'nullable|exists:positions,id',
            'observation'=>'nullable'
        ]);

        $this->materiel->update(
            [
                'reference' => $this->reference,
                'date' => $this->date,
                'type_id' => $this->type_id,
                'etat_id' => $this->etat_id,
                'marque_id' => $this->marque_id,
                'position_id' => $this->position_id,
                'observation'=>$this->observation
            ]
        );

        session()->flash('message', 'Mise à jour avec succès.');

        $this->resetMateriel();
    }



    public function resetMateriel()
    {
        $this->reference=null;
        $this->date=null;
        $this->type_id=null;
        $this->etat_id=null;
        $this->marque_id=null;
        $this->position_id=null;
        $this->observation=null;
    }


}
