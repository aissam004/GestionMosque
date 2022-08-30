<?php

namespace App\Http\Livewire;

use App\Models\Personne;
use App\Models\Transaction;

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

class TransactionsTable extends LivewireDatatable
{
    use WithFileUploads;

    //public $beforeTableSlot = "personnes.show-personne-before";
    public $afterTableSlot = "transactions.add-transaction";

    public $personnes = null;


    public ?Personne $personne = null;
    public ?Transaction $transaction = null;
    public $date;
    public $isincome=true;
    public $detail;
    public $total;
    public $all = true;

    public $personne_selected;

    public function builder()
    {
        /*
        if($this->personne || $this->all){
            $this->isincome=true;
        }*/
        if ($this->personne) {
            return $this->personne->transactions();
        } else {
            $this->personnes = Personne::all();
            if ($this->all) {
                return Transaction::query()->leftjoin('personnes', 'transactions.personne_id', 'personnes.id');
            } else if ($this->isincome) {
                return Transaction::query()->where('isincome', true)
                    ->leftjoin('personnes', 'transactions.personne_id', 'personnes.id');
            } else {
                return Transaction::query()->where('isincome', false)
                    ->leftjoin('personnes', 'transactions.personne_id', 'personnes.id');
            }
        }
    }

    public function columns()
    {
        $columns = [
            //  Column::index($this),
            NumberColumn::name('id')
                ->label(__('ID'))
                ->alignCenter(),
            BooleanColumn::callback('isincome', function ($isincome) {
                if ($isincome) {
                    return '<i class="fa fa-solid fa-arrow-up" style=" color: green;"></i>';
                } else {
                    return '<i class="fa fa-arrow-down" style=" color: red;"></i>';
                }
            })->alignCenter(),
            Column::name('detail')
                ->label(__('Détail'))
                ->filterable()
                ->searchable()
                ->alignCenter(),
            DateColumn::name('date')
                ->label(__('Date'))
                ->filterable()
                ->alignCenter(),
            NumberColumn::name('total')
                ->label(__('Total'))
                ->filterable()
                ->alignCenter()
                ->view('components.total-table')
        ];

        if ($this->personne == null) {
            array_push(
                $columns,
                //Column::raw('CONCAT(personnes.nom," ",personnes.prenom) AS fullname')->filterable(),

                Column::callback(['personnes.id', 'personnes.nom', 'personnes.prenom'], function ($id, $nom, $prenom) {
                    return '<a href="' . route('personnes.show', $id) . '" class="border-2 border-transparent hover:border-blue-500 hover:bg-blue-100 hover:shadow-lg text-blue-600 rounded-lg px-3 py-1">' . $nom . ' ' . $prenom . '</a>';
                })
                ->label(__('Personne'))
                ->filterable()
                ->searchable()
                ->alignCenter()
            );
        }
        array_push(
            $columns,
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
                return view('personnes.table-actions', ['id' => $id]);
            })->unsortable()->excludeFromExport()
        );


        return $columns;
    }


    public function saveTransaction()
    {

        $this->validate([
            'isincome' => 'boolean|required',
            'date' => 'date|nullable',
            'detail' => 'nullable',
            'total' => 'numeric|min:0',

        ]);

        $this->transaction = new Transaction(
            [
                'isincome' => $this->isincome,
                'date' => $this->date,
                'detail' => $this->detail,
                'total' => $this->isincome ? $this->total : $this->total * -1
            ]
        );
        if ($this->personne != null) {
            $this->personne->transactions()->save($this->transaction);
        } else {
            $this->transaction->personne_id = $this->personne_selected;
            $this->transaction->save();
        }


        session()->flash('message', 'Ajout avec succès.');
        $this->resetTransaction();
    }

    public function edit($id)
    {

        $this->transaction = Transaction::find($id);

        $this->date = $this->transaction->date;
        $this->isincome = $this->transaction->isincome;
        $this->detail = $this->transaction->detail;

        $this->total = $this->transaction->total >= 0 ? $this->transaction->total : $this->transaction->total * -1;
        if ($this->personne == null) {
            $this->personne_selected = $this->transaction->personne_id;
        }
    }
    public function updateTransaction()
    {
        $this->validate([
            'isincome' => 'boolean|required',
            'date' => 'date|nullable',
            'detail' => 'nullable',
            'total' => 'numeric|min:0',

        ]);
        if ($this->personne != null) {
            $this->personne_selected = $this->personne->id;
        }
        if ($this->personne_selected == "null") {
            $this->personne_selected = null;
        }
        $this->transaction->update(
            [
                'isincome' => $this->isincome,
                'date' => $this->date,
                'detail' => $this->detail,
                'total' => $this->isincome ? $this->total : $this->total * -1,
                'personne_id' => $this->personne_selected
            ]
        );
        $this->resetTransaction();

        session()->flash('message', 'Mise à jour avec succès.');
    }

    public function resetTransaction()
    {
        $this->transaction = null;
        $this->date = null;
        $this->isincome;
        $this->detail = null;
        $this->total = null;
        if ($this->personne != null) {
            $this->emitTo('personne-profile', 'refresh');
        } else {
            $this->personne_selected = null;
            $this->emitTo('transactions-total', 'refresh');
        }
    }
}
