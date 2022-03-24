@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.BootstrapSwitch', true)

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Liste des commandes")}}

    </x-slot>

<div class="container-fluid">


    <livewire:show-commandes hideable="select"
    exportable/>

</div>



</x-admin-lte-layout>
