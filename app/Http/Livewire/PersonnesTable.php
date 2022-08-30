<?php

namespace App\Http\Livewire;

use App\Models\Personne;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\ComplexQuery;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\TimeColumn;

class PersonnesTable extends LivewireDatatable
{
    use WithFileUploads;


    public $afterTableSlot = "personnes.add-personne";

    public ?Personne $personne = null;
    public $nom;
    public $prenom;
    public $adress;
    public $phone;
    public $ismember=false;
    public $fonction;

    public $model = Personne::class;


    public function columns()
    {
        return [
            //  Column::index($this),
            Column::callback(['id'], function ($id) {
                return view('personnes.table-actions', ['id' => $id]);
            })->unsortable()->excludeFromExport(),
            NumberColumn::name('id')
            ->label(__('ID'))
            ->alignCenter(),
            Column::name('nom')
                ->label(__('Nom'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            Column::name('prenom')
                ->label(__('Prenom'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            Column::name('phone')
                ->label(__('Phone'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            Column::name('adress')
                ->label(__('Adresse'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            BooleanColumn::name('ismember')
                ->label(__('Membre'))
                ->filterable()
                ->alignCenter(),
            Column::name('fonction')
                ->label(__('Fonction'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            NumberColumn::name('transactions.id:count')
                ->label(__('Nombre transactions'))
                ->filterable()
                ->alignCenter(),

            NumberColumn::name('transactions.total:sum')
                ->label(__('Total'))
                ->filterable()
                ->alignCenter(),
            NumberColumn::name('incomes.total:sum')
                ->label(__('Incomes'))
                ->hide()
                ->filterable()
                ->alignCenter(),
            NumberColumn::name('depenses.total:sum')
                ->label(__('Depenses'))
                ->hide()
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


        ];
    }


    public function savePersonne()
    {
      $this->validate([
            'nom' =>'required|max:300',
            'prenom'=>'nullable|max:300',
            'adress'=>'nullable',
            'phone'=> 'required|regex:/(0)[0-9]{9}/|size:10',
            'ismember'=>'boolean',
            'fonction'=>'nullable'

        ]);
        $this->personne = Personne::create(
                [
                'nom' => $this->nom,
                'prenom'=>$this->prenom,
                'adress'=>$this->adress,
                'phone'=> $this->phone,
                'ismember'=>$this->ismember,
                'fonction'=>$this->ismember?$this->fonction:null
                ]
            );



        $this->resetPersonne();

        session()->flash('message', 'Ajout avec succès.');
    }

    public function edit($id)
    {

        $this->personne = Personne::find($id);

        $this->nom=$this->personne->nom;
        $this->prenom=$this->personne->prenom;
        $this->adress=$this->personne->adress;
        $this->phone=$this->personne->phone;
        $this->ismember=$this->personne->ismember;
        $this->fonction=$this->personne->fonction;


    }
    public function updatePersonne()
    {
        $this->validate([
            'nom' =>'required|max:300',
            'prenom'=>'nullable|max:300',
            'adress'=>'nullable',
            'phone'=> 'required|regex:/(0)[0-9]{9}/|size:10',
            'ismember'=>'boolean',
            'fonction'=>'nullable'

        ]);

        $this->personne->update(
            [
                'nom' => $this->nom,
                'prenom'=>$this->prenom,
                'adress'=>$this->adress,
                'phone'=> $this->phone,
                'ismember'=>$this->ismember,
                'fonction'=>$this->ismember?$this->fonction:null
            ]
        );

        session()->flash('message', 'Mise à jour avec succès.');

        $this->resetPersonne();
    }



    public function resetPersonne()
    {
    $this->personne = null;
    $this->nom=null;
    $this->prenom=null;
    $this->adress=null;
    $this->phone=null;
    $this->ismember=false;
    $this->fonction=null;
    }

}
