

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("modifier la commande")}}

    </x-slot>

<div class="container-fluid">


    <livewire:edit-commandes

     hideable="select"
    exportable
    :commande="$commande"
    :types="$types"
    :commande_id="$commande->id" />

</div>



</x-admin-lte-layout>
