

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Boite N°".$boite->numero.': "'.$boite->titre.' "')}}

    </x-slot>

<div class="container-fluid">



    <livewire:show-boites
    hideable="select"
   
   exportable
   :boite="$boite"
   />


</div>



</x-admin-lte-layout>
