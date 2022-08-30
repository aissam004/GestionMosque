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
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Spatie\Tags\Tag;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\ComplexQuery;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ShowDocuments extends LivewireDatatable
{
    use WithFileUploads;





      public function hydrate()
      {
         $this->emit('loadSelect2Hydrate');
      }

      public function selectedItem($value)
            {
            dd($value);
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
			->linkTo('boites')
           ->alignCenter(),
          // Column::callback(['tags.name:JSON_ARRAYAGG'], function ($name) {
                //$obj=json_decode($name,true);
               // $obj2=(array) json_encode($obj);
                //var_dump($obj);
          //  return $name;

      //  }),
           // Column::raw("(select GROUP_CONCAT(distinct `name` separator ', ') from `tags`  inner join `taggables` on `tags`.`id` = `taggables`.`tag_id` where  `documents`.`id` = `taggables`.`taggable_id` and `taggables`.`taggable_type` = 'App\Models\Document') AS tags"),

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
             Column::callback(['id','path'], function ($id,$path) {
                return view('boites.table-actions-document', ['id' => $id,'path'=>$path]);
            })->unsortable()->excludeFromExport()
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



}
