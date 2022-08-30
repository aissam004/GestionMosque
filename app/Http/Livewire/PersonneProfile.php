<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PersonneProfile extends Component
{
    public $personne;

    protected $listeners = ['refresh'];

    public function render()
    {
        return view('livewire.personne-profile');
    }

    public function refresh()
    {
       
        $this->personne->load('incomes');
        $this->personne->load('depenses');
    }
}
