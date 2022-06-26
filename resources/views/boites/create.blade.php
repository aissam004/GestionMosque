


<x-admin-lte-layout>
    <x-slot name="header">
        @if (isset($boite))
        {{__("Modifier boite")}}
        @else
        {{__("Créer boite")}}
        @endif
    </x-slot>

<div class="container-fluid col-md-8">

    @if (isset($boite))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('boites.update', $boite) }}">

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('boites.store') }}" >

	@endif
        @csrf

        <x-adminlte-input error-key="numero"  type="number"  name="numero" label='{{ __("Numéro de la boîte") }}'  value="{{isset($boite->numero)?$boite->numero: old('numero') }}"
             placeholder='{{ __("Numéro de la boîte") }}' label-class="text-lightblue" >

            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-solid fa-barcode"></i>
                </div>

            </x-slot>

        </x-adminlte-input>

        <x-adminlte-input error-key="titre"  type="text"  name="titre" label='{{ __("Titre") }}'  value="{{isset($boite->titre)?$boite->titre: old('titre') }}"
            placeholder='{{ __("Titre") }}' label-class="text-lightblue" maxlength=100 >

           <x-slot name="prependSlot">
               <div class="input-group-text">
                   <i class="fa fa-solid fa-barcode"></i>
               </div>

           </x-slot>

       </x-adminlte-input>

        <x-adminlte-button  type="submit" label="{{isset($boite)?__('Update'): __('Save') }}" theme="success" icon="fas fa-lg fa-save"/>

    </form>

</div>



</x-admin-lte-layout>
