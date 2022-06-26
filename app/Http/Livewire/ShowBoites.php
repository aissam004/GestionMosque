<?php

namespace App\Http\Livewire;

use App\Models\Boite;
use App\Models\Confidentialite;
use Livewire\Component;
use App\Models\Document;
use App\Models\Domaine;
use App\Models\Nature;
use App\Models\Structure;
use App\Models\User;
use Livewire\WithFileUploads;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\ComplexQuery;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ShowBoites extends LivewireDatatable
{
    use WithFileUploads;

    public Boite $boite;
    public $afterTableSlot = "boites.add-document";

    public $structure;
    public $structure_id;

    public $file;

    public $domaines;
    public $domaine_id;

    public $confidentialites;
    public $confidentialite_id;


    //public $beforeTableSlot = "documents.edit-documents";
    //public $afterTableSlot = "commandes.editForm";


    public function builder()
    {
        $this->boite->refresh();

        $this->structures=Structure::all();
        $this->domaines=Domaine::all();
        $this->confidentialites=Confidentialite::all();

        $this->confidentialite_id=1;

        return Document::where('boite_id',$this->boite->id)
        ->leftJoin('structures', 'structures.id', 'documents.structure_id')
        ->leftJoin('domaines', 'domaines.id', 'documents.domaine_id')
        ->leftJoin('confidentialites', 'confidentialites.id', 'documents.confidentialite_id')
        ->leftJoin('natures', 'natures.id', 'documents.nature_id')
        ->leftJoin('boites', 'boites.id', 'documents.boite_id')
        ->leftJoin('users', 'users.id', 'documents.user_id');
    }


    public function columns()
    {
        return [
          //  Column::index($this),
            NumberColumn::name('id')->alignCenter(),
            Column::name('reference')
            ->filterable()
            ->searchable()
            ->alignCenter(),
            DateColumn::name('date')
            ->filterable()
            ->alignCenter(),
            Column::name('objet')
            ->filterable()
            ->searchable()
            ->alignCenter(),
            Column::name('structure.abreviation')
            ->label('Structure')
            ->filterable($this->structure)
            ->alignCenter(),
            Column::name('observation')
            ->filterable()
            ->searchable()
            ->alignCenter(),
            Column::name('domaine.titre')
            ->label('Domaine')
            ->filterable($this->domaine)
            ->alignCenter(),
            Column::name('confidentialite.titre')
            ->label('confidentialite')
            ->filterable($this->confidentialite)
            ->alignCenter(),
            Column::name('user.username')
            ->label('Utilisateur')
            ->filterable($this->user)
            ->hideable()
            ->hide()
            ->alignCenter()
            ->excludeFromExport(),
            Column::name('boite.numero')
            ->label('N° Boite')
            ->filterable($this->boiteNumero)
            ->hideable()
            ->hide()
           ->alignCenter(),
            Column::name('tags.titre:group_concat')
            ->label('Tags')
            ->filterable()
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
            Column::delete()->alignCenter()->excludeFromExport()
        ];
    }
    public function getStructureProperty()
    {
        return Structure::pluck('abreviation');
    }
    public function getConfidentialiteProperty()
    {
        return Confidentialite::pluck('titre');
    }
    public function getDomaineProperty()
    {
        return Domaine::pluck('titre');
    }
    public function getNatureProperty()
    {
        return Nature::pluck('titre');
    }
    public function getBoiteNumeroProperty()
    {
        return Boite::pluck('numero');
    }
    public function getUserProperty()
    {
        return User::pluck('username');
    }


    public function delete($id){
/*
        $this->commande->types()->detach(CommandeType::find($id)->type);
        $this->commande->refresh();
        $this->types=Type::all();
        $this->types=$this->types->diff($this->commande->types);

        */
    }



}
