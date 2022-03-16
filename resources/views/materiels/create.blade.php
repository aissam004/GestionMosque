@section('plugins.Select2', true)


<x-admin-lte-layout>
    <x-slot name="header">
        {{__("create material")}}
    </x-slot>

<div class="container-fluid col-md-8">
    <form action="{{route('materiels.store')}}" method="post" >
        @csrf
        <x-adminlte-input type="text"  name="serialnumber" label='{{ __("serialnumber") }}' value="{{ old('serialnumber') }}"
             placeholder='{{ __("serialnumber") }}' label-class="text-lightblue" required maxlength=100>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-solid fa-barcode"></i>
                </div>

            </x-slot>

        </x-adminlte-input>

        <livewire:modeles >

        <x-adminlte-button  type="submit" label="{{ __('save') }}" theme="success" icon="fas fa-lg fa-save"/>

    </form>

</div>



</x-admin-lte-layout>
