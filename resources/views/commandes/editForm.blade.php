<div>
    <form wire:submit.prevent="save">
        <div class="row">

            <x-adminlte-select   name="type_id" label='{{ __("type") }}' class="select-options"  style="width:auto;" label-class="text-lightblue" wire:model="type_id" >
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fab fa-apple"></i>
                    </div>
                </x-slot>
                <option   selected  disabled value="null">{{ __('select type') }}</option>
                @foreach ($types as $type)
                <option   value="{{ $type->id }}" >{{ $type->title }}</option>
                @endforeach
            </x-adminlte-select>


            <x-adminlte-input  type="number"  name="quantite" label='{{ __("quantite") }}'
                placeholder='{{ __("quantite") }}' label-class="text-lightblue" fgroup-class="ml-2" maxlength=100 wire:model.lazy="quantite">

               <x-slot name="prependSlot">
                   <div class="input-group-text">
                       <i class="fa fa-solid fa-barcode"></i>
                   </div>

               </x-slot>

           </x-adminlte-input>


           <x-adminlte-textarea name="observation" label='{{ __("observation") }}' rows=2 fgroup-class="ml-2 col-lg-4" label-class="text-lightblue"
                placeholder='{{ __("observation") }}' value="{{ __('') }}" wire:model.lazy="observation">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                    </div>
                </x-slot>
            </x-adminlte-textarea>

        </div>
        <x-adminlte-button  type="submit" label="{{ __('Save') }}" theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>

    </form>
</div>

