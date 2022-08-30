<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class TransactionsTotal extends Component
{
    public $total;
    public $incomes;
    public $depenses;
    public $all;
    public $isincome;

    protected $listeners = ['refresh'];

      public function boot()
    {
        $this->refresh();
    }
    public function render()
    {
        return view('livewire.transactions-total');
    }
    public function refresh()
    {
        $this->total=Transaction::all()->sum('total');
        $this->incomes=Transaction::incomes()->get()->sum('total');
        $this->depenses=Transaction::depenses()->get()->sum('total');
    }
}
