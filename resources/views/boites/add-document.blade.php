@section('plugins.BsCustomFileInput', true)

@section('plugins.Select2', true)

<div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">

                <x-adminlte-alert theme="success" class="close-alert" title="Succès" icon="fas fa-lg fa-thumbs-up" dismissable>
                    {{ session('message') }}
                </x-adminlte-alert>

        </div>
    @endif
        @if ($this->document)
            <form wire:submit.prevent="updateDocument" >

        @else
            <form wire:submit.prevent="saveDocument" >
        @endif


        <div class="card" id="form-document">
            <div class="card-header  bg-light">
                <h5 class="card-title text-bold">{{ $this->document?__("Modifier"):__("Ajouter") }} {{ __("document") }}</h5>
            </div>

            <div class="card-body" >
                    <div class="row" >
                        <x-adminlte-input  type="text" name="reference" wire:model.defer="reference" label='{{ __("Reference") }}' placeholder='Reference' style="width:auto;" label-class="text-lightblue" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-solid fa-barcode"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>

                        <x-adminlte-input  type="date" name="date" label='{{ __("Date") }}' wire:model.defer="date" fgroup-class="ml-2"  style="width:auto;" label-class="text-lightblue" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa  fa-calendar-alt"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-input>


                        <x-adminlte-select   name="structure_id" label='{{ __("Structure") }}' class="select-options" fgroup-class="ml-2" style="width:auto;" label-class="text-lightblue" required wire:model.defer="structure_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('select structure') }}</option>
                            @if (is_array($structures) || is_object($structures))
                                @foreach ($structures as $structure)
                                    <option   value="{{ $structure->id }}" >{{ $structure->abreviation }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>

                        <x-adminlte-input-file  name="file" label='{{ __("Fichier") }}' accept=".pdf" placeholder='{{  __("Choisir un fichier...")}}'
                                    wire:model="file" legend='{{ __("Choisir") }}'  fgroup-class="ml-2"  style="width:auto;" label-class="text-lightblue" >

                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                            <x-slot name="bottomSlot">
                                <div wire:loading wire:target="file" class="text-green">
                                    {{ __('Téléchargement du fichier...') }}
                                </div>
                                <div wire:loading.remove wire:target="file">

                                        <span class="text-sm text-gray">
                                            {{ $file?__("le nom de fichier est: "):"" }}
                                        </span>
                                        <span class="text-sm text-green">
                                            {{ $file?$file->getClientOriginalName():"" }}
                                        </span>
                                        <span class="text-sm text-red">
                                            {{ $file?"":__("Aucun fichier n'est selectionné") }}
                                        </span>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>

                    </div>
                    <div class="row" >
                        <x-adminlte-textarea name="objet" label="{{ __('Objet') }}" rows=5 style="width:400px;"
                                        required    label-class="text-primary" placeholder="{{ __('Ecrire l\'objet du document...') }}" wire:model.defer="objet">
                                        <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-comment-dots text-primary"></i>
                                                    </div>
                                            </x-slot>
                        </x-adminlte-textarea>
                        <x-adminlte-textarea name="observation" label="{{ __('Observation') }}" rows=5 style="width:400px;"
                                            label-class="text-primary" fgroup-class="ml-2" placeholder="{{ __('Ecrire l\'observation...') }}" wire:model.defer="observation">
                                        <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-comment-dots text-primary"></i>
                                                    </div>
                                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                    <div class="row" >

                        <x-adminlte-select   name="nature_id" label='{{ __("Nature") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="nature_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner nature') }}</option>
                            @if (is_array($natures) || is_object($natures))
                                @foreach ($natures as $nature)
                                    <option   value="{{ $nature->id }}" >{{ $nature->titre }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>

                        <x-adminlte-select   name="domaine_id" label='{{ __("Domaine") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="domaine_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner domaine') }}</option>
                            @if (is_array($domaines) || is_object($domaines))
                                @foreach ($domaines as $domaine)
                                    <option   value="{{ $domaine->id }}" >{{ $domaine->titre }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>

                        <x-adminlte-select   name="confidentialite_id" label='{{ __("Confidentialite") }}' class="select-options" fgroup-class="ml-2"
                                                style="width:auto;" label-class="text-lightblue" wire:model.defer="confidentialite_id">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fab fa-apple"></i>
                                </div>
                            </x-slot>
                            <option   disabled value="null">{{ __('Selectionner confidentialites') }}</option>
                            @if (is_array($confidentialites) || is_object($confidentialites))
                                @foreach ($confidentialites as $confidentialite)
                                    <option   value="{{ $confidentialite->id }}" >{{ $confidentialite->titre }}</option>
                                    @endforeach
                            @endif

                        </x-adminlte-select>




                    </div>


                   <x-adminlte-button  type="submit" wire:loading.attr="disabled" wire:target="file" label='{{ $this->document?__("Edit"):__("Save") }}' theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
                    <x-adminlte-button  type="reset" wire:click="resetDocument" label='{{ __("Réninstaliser") }}' theme="secondary" class="bg-gray-500" />


               </div>
            </div>

        </div>

    </form>



<div>
