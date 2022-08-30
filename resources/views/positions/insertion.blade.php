

<div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">

                <x-adminlte-alert theme="success" class="close-alert" title="Succès" icon="fas fa-lg fa-thumbs-up" dismissable>
                    {{ session('message') }}
                </x-adminlte-alert>

        </div>
    @endif
    @if ($this->position)
        <form wire:submit.prevent="update" >

    @else
        <form wire:submit.prevent="save" >
    @endif


            <div class="card">
                <div class="card-header  bg-light">
                    <h5 class="card-title text-bold">{{ $this->position?__("Modifier"):__("Ajouter") }} {{ __("position") }}</h5>
                </div>

                    <div class="card-body" >
                        <div class="row" >
                            <x-adminlte-input  type="text" name="name" wire:model.defer="name" label='{{ __("Nom de la position") }}' placeholder='{{ __("Nom de la position") }}' style="width:auto;" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-solid fa-barcode"></i>
                                    </div>
                                </x-slot>
                                <x-slot name="appendSlot">
                                    <x-adminlte-button theme="outline-success" type="submit"  label='{{ $this->position?__("Edit"):__("Save") }}'/>
                                </x-slot>

                            </x-adminlte-input>



                        </div>
                    </div>

            </div>

         </form>



        </div>
