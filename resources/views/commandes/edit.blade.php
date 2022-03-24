

<x-admin-lte-layout>
    <x-slot name="header">
        @if (isset($materiel))
        {{__("modify commande")}}
        @else
        {{__("create commande")}}
        @endif
    </x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  action="{{route('commandes.store')}}" method="post" class="container-fluid col-md-10">
    @csrf
   
    <div id="dynamic_form" >
        <div class="row">
            <div class="col-lg-6">
            <x-adminlte-select   name="type" label='{{ __("type") }}' class="select-options"   style="width:auto;" label-class="text-lightblue " >
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
        </div>
            <x-adminlte-input  type="number"  name="quantite" label='{{ __("quantite") }}'
                placeholder='{{ __("quantite") }}' label-class="text-lightblue" fgroup-class="ml-2" maxlength=100 >

               <x-slot name="prependSlot">
                   <div class="input-group-text">
                       <i class="fa fa-solid fa-barcode"></i>
                   </div>

               </x-slot>

           </x-adminlte-input>


                    <x-adminlte-textarea name="observation" label='{{ __("observation") }}' rows=2 fgroup-class="ml-2 col-lg-4" label-class="text-lightblue"
                placeholder='{{ __("observation") }}' value="{{ __('') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                    </div>
                </x-slot>
            </x-adminlte-textarea>

        <div class="button-group ">

            <a  id="plus" class="text-primary" style="cursor: pointer;"><i class="fa fa-lg fa-plus-circle"></i><span class="sr-only"></span></a>
            <a  id="minus" class="text-danger" style="cursor: pointer;"><i class="fa fa-lg fa-minus-circle "></i><span class="sr-only"></span></a>

        </div>

      </div>

    <hr/>
    </div>
    <x-adminlte-button  type="submit" label="{{isset($commande)?__('Update'): __('Save') }}" theme="success" icon="fas fa-lg fa-save"/>
</form>
</x-admin-lte-layout>



