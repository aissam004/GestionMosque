

<x-admin-lte-layout>
    <x-slot name="header">
        @if (isset($materiel))
        {{__("modify commande")}}
        @else
        {{__("create commande")}}
        @endif
    </x-slot>

    <div id="dynamic_form" class="container-fluid col-md-8">
        <div class="row ">
            <x-adminlte-select   name="type" label='{{ __("type") }}' class="select-options" label-class="text-lightblue " >
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
                placeholder='{{ __("quantite") }}' label-class="text-lightblue" fgroup-class="ml-2" maxlength=100 >

               <x-slot name="prependSlot">
                   <div class="input-group-text">
                       <i class="fa fa-solid fa-barcode"></i>
                   </div>

               </x-slot>

           </x-adminlte-input>

           <x-adminlte-input  type="text"  name="obse" label='{{ __("quantite") }}'
                placeholder='{{ __("quantite") }}' label-class="text-lightblue" fgroup-class="ml-2" maxlength=100 >

               <x-slot name="prependSlot">
                   <div class="input-group-text">
                       <i class="fa fa-solid fa-barcode"></i>
                   </div>

               </x-slot>

           </x-adminlte-input>

        <div class="button-group ">

            <x-adminlte-button id="plus" icon="fa fa-solid fa-plus " theme="primary" />
            <x-adminlte-button id="minus" icon="fa fa-solid fa-minus" theme="danger" />

        </div>

    </div>
    </div>


</x-admin-lte-layout>



