

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Personnes")}}

    </x-slot>

<div class="container-fluid">


    
    <livewire:personnes-table
    hideable="select"

   exportable

   />


</div>



</x-admin-lte-layout>
