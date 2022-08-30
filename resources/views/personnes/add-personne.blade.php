@section('plugins.BsCustomFileInput', true)


<div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">

                <x-adminlte-alert theme="success" class="close-alert" title="Succès" icon="fas fa-lg fa-thumbs-up" dismissable>
                    {{ session('message') }}
                </x-adminlte-alert>

        </div>
    @endif
        @if ($this->personne)
            <form wire:submit.prevent="updatePersonne" >

        @else
            <form wire:submit.prevent="savePersonne" >
        @endif


        <div class="card" id="form-personne">
            <div class="card-header  bg-light">
                <h5 class="card-title text-bold">{{ $this->personne?__("Modifier"):__("Ajouter") }} {{ __("Personne") }}</h5>
            </div>

            <div class="card-body" >
                    <div class="row" >
                        <x-adminlte-input fgroup-class="mx-2" type="text" name="nom" wire:model.defer="nom" label='{{ __("Nom") }}' placeholder='{{ __("Nom") }}' style="width:auto;" label-class="text-lightblue" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>
                        <x-adminlte-input fgroup-class="mx-2" type="text" name="prenom" wire:model.defer="prenom" label='{{ __("Prenom") }}' placeholder='{{ __("Prenom") }}' style="width:auto;" label-class="text-lightblue" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>
                        <x-adminlte-input fgroup-class="mx-2" type="tel" name="phone" pattern="[0][0-9]{9}" maxlength="10" wire:model.defer="phone" label='{{ __("Téléphone") }}' placeholder='{{ __("Téléphone") }}' style="width:auto;" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>
                        <x-adminlte-input fgroup-class="mx-2" type="text" name="adress" wire:model.defer="adress" label='{{ __("Adresse") }}' placeholder='{{ __("Téléphone") }}' style="width:auto;" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                    </div>

                    <div class="row" >
                        <div class="form-group grid grid-rows-3 mr-5">
                            <label for="ismember" class="text-lightblue">{{__("Est-il un membre?")}}</label>
                            <input  type="checkbox" id="ismember" name="ismember" wire:model="ismember"  class="mx-3">
                        </div>
                        @if ($ismember)
                        <x-adminlte-input fgroup-class="mx-2" type="text" name="fonction" wire:model.defer="fonction" label='{{ __("Fonction") }}' placeholder='{{ __("Fonction") }}' style="width:auto;" label-class="text-lightblue" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>
                        @endif

                    </div>

                    <div class="row" >
                        <x-adminlte-button  type="submit"  label='{{ $this->personne?__("Edit"):__("Save") }}' theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
                        <x-adminlte-button  type="reset" wire:click="resetPersonne" label='{{ __("Réninstaliser") }}' theme="secondary" class="bg-gray-500" />
                    </div>

               </div>
            </div>

        </div>

    </form>



<div>
