


<x-admin-lte-layout>
    <x-slot name="header">
        @if (isset($materiel))
        {{__("modify material")}}
        @else
        {{__("create material")}}
        @endif
    </x-slot>

<div class="container-fluid col-md-8">

    @if (isset($materiel))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('materiels.update', $materiel) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('materiels.store') }}" enctype="multipart/form-data" >

	@endif

    <form action="{{route('materiels.store')}}" method="post" >
        @csrf

        <x-adminlte-input error-key="serialnumber"  type="text"  name="serialnumber" label='{{ __("serialnumber") }}'  value="{{isset($materiel->serialnumber)?$materiel->serialnumber: old('serialnumber') }}"
             placeholder='{{ __("serialnumber") }}' label-class="text-lightblue" maxlength=100 >

            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-solid fa-barcode"></i>
                </div>

            </x-slot>

        </x-adminlte-input>

        @php
        $marque=isset($materiel->modele->marque_id)?$materiel->modele->marque_id:old("marque");
        $type=isset($materiel->modele->type_id)?$materiel->modele->type_id:old("type");
        $modele=isset($materiel->modele_id)?$materiel->modele_id: old("modele");

        @endphp

        <livewire:modeles :marque_id="$marque" :type_id="$type" :modele_id="$modele">

        <x-adminlte-button  type="submit" label="{{isset($materiel)?__('Update'): __('Save') }}" theme="success" icon="fas fa-lg fa-save"/>

    </form>

</div>



</x-admin-lte-layout>
