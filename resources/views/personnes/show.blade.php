@push('cssFile')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{ __('Personne') . ': ' }}

    </x-slot>

    <livewire:personne-profile :personne="$personne">

        
    <div class="container-fluid">

        <livewire:transactions-table
        hideable="select"
        exportable
        :personne="$personne"/>


    </div>



</x-admin-lte-layout>
