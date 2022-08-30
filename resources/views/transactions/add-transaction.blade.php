
<div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">

                <x-adminlte-alert theme="success" class="close-alert" title="Succès" icon="fas fa-lg fa-thumbs-up" dismissable>
                    {{ session('message') }}
                </x-adminlte-alert>

        </div>
    @endif
        @if ($this->transaction)
            <form wire:submit.prevent="updateTransaction" >

        @else
            <form wire:submit.prevent="saveTransaction" >
        @endif


        <div class="card" id="form-transaction">
            <div class="card-header  bg-light">
                <h5 class="card-title text-bold">{{ $this->transaction?__("Modifier"):__("Ajouter") }} {{ __("Transaction") }}</h5>
            </div>

            <div class="card-body" >
                    <div class="row w-1/2">
                        <x-adminlte-select name="isincome" label="{{__('Type Transaction')}}" label-class="text-lightblue" wire:model="isincome">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-money-bill {{$this->isincome?"text-green":"text-red"}}"></i>

                                    <i class="{{$this->isincome?"fas fa-arrow-up text-green":"fas fa-arrow-down text-red"}}"></i>
                                </div>
                            </x-slot>
                            @if ($all || !$all && $isincome)
                                <option value=1>{{__('Income')}}</option>
                            @endif
                            @if ($all || !$all && !$isincome)
                                <option value=0>{{__('Depense')}}</option>
                            @endif
                        </x-adminlte-select>
                    </div>

                    <div class="row" >
                        <x-adminlte-input  type="date" name="date" wire:model.defer="date" label='{{ __("Date") }}' placeholder='{{ __("Date") }}' style="width:auto;" label-class="text-lightblue" fgroup-class="ml-2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fa fa-solid fa-calendar-alt"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                        <x-adminlte-input  type="text" name="detail" wire:model.defer="detail" label='{{ __("Détail") }}' placeholder='{{ __("Détail") }}' style="width:auto;" label-class="text-lightblue" fgroup-class="ml-2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-info"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                        <x-adminlte-input  type="number" name="total" wire:model.defer="total" placeholder='{{ __("Total") }} en {{"DA"}}' label='{{ __("Total") }}'
                                     style="width:auto;" label-class="text-lightblue" fgroup-class="ml-2" class="{{$this->isincome?'text-green':'text-red'}} text-bold text-xl" min="0" default="0" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-coins"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                        @if ($personne==null)
                        <x-adminlte-select name="personne_selected" label="{{__('Personne')}}" fgroup-class="ml-2" label-class="text-lightblue" wire:model="personne_selected">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>

                                </div>
                            </x-slot>
                            <option value="null" selected>{{__('"Choisir une personne..."')}}</option>

                            @foreach($personnes as $personne_selected)
                                <option value="{{$personne_selected->id}}">{{$personne_selected->nom}} {{$personne_selected->prenom}}</option>
                            @endforeach
                        </x-adminlte-select>
                        @endif


                    </div>



                    <div class="row" >
                        <x-adminlte-button  type="submit"  label='{{ $this->transaction?__("Edit"):__("Save") }}' theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
                        <x-adminlte-button  type="reset" wire:click="resetPersonne" label='{{ __("Réninstaliser") }}' theme="secondary" class="bg-gray-500" />
                    </div>

               </div>
            </div>

        </div>

    </form>



<div>
