
            <a href="{{ route('materiels.options') }}">
                <x-adminlte-button type="button" label="{{ 'options' }}" theme="outline-secondary"/>
            </a>

<div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">

                <x-adminlte-alert theme="success" class="close-alert" title="Succès" icon="fas fa-lg fa-thumbs-up" dismissable>
                    {{ session('message') }}
                </x-adminlte-alert>

        </div>
    @endif
        @if ($this->materiel)
            <form wire:submit.prevent="updateMateriel" >

        @else
            <form wire:submit.prevent="saveMateriel" >
        @endif


        <div class="card" id="form-materiel">
            <div class="card-header  bg-light">
                <h5 class="card-title text-bold">{{ $this->materiel?__("Modifier"):__("Ajouter") }} {{ __("matériel") }}</h5>
            </div>

            <div class="card-body" >
                    <div class="row" >
                        <x-adminlte-input  type="text" name="reference" wire:model.defer="reference" label='{{ __("Reference") }}' placeholder='{{ __("Reference") }}' style="width:auto;" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                        <x-adminlte-input   type="date" name="date" label='{{ __("Date") }}' wire:model.defer="date" fgroup-class="ml-2"  style="width:auto;" label-class="text-lightblue" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa  fa-calendar-alt"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>


                        <x-adminlte-select   name="type_id" label='{{ __("Type") }}' class="select-options" fgroup-class="ml-2" style="width:auto;" label-class="text-lightblue" required wire:model.defer="type_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner type') }}</option>
                            @if (is_array($this->types) || is_object($this->types))
                                @foreach ($this->types as $type)
                                    <option   value="{{ $type->id }}" >{{ $type->title }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>


                    </div>

                    <div class="row" >

                        <x-adminlte-select   name="position_id" label='{{ __("Position") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="position_id" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner position') }}</option>
                            @if (is_array($this->positions) || is_object($this->positions))
                                @foreach ($this->positions as $position)
                                    <option   value="{{ $position->id }}" >{{ $position->name }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>

                        <x-adminlte-select   name="marque_id" label='{{ __("Marque") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="marque_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner marque') }}</option>
                            @if (is_array($this->marques) || is_object($this->marques))
                                @foreach ($this->marques as $marque)
                                    <option   value="{{ $marque->id }}" >{{ $marque->name }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>

                        <x-adminlte-select   name="etat_id" label='{{ __("Etat") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="etat_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner état') }}</option>
                            @if (is_array($this->etats) || is_object($this->etats))
                                @foreach ($this->etats as $etat)
                                    <option   value="{{ $etat->id }}" >{{ $etat->title }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>




                    </div>
                    <div class="row" >

                        <x-adminlte-textarea name="observation" label="{{ __('Observation') }}" rows=5 style="width:400px;"
                                            label-class="text-primary" fgroup-class="ml-2" placeholder="{{ __('Ecrire une observation...') }}" wire:model.defer="observation">
                                        <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-comment-dots text-primary"></i>
                                                    </div>
                                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                    <div class="row" >
                        <x-adminlte-button  type="submit"  label='{{ $this->materiel?__("Edit"):__("Save") }}' theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
                        <x-adminlte-button  type="reset" wire:click="resetMateriel" label='{{ __("Réninstaliser") }}' theme="secondary" class="bg-gray-500" />
                    </div>

               </div>
            </div>

        </div>

    </form>



<div>
