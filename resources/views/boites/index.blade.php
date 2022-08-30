@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.BootstrapSwitch', true)

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Liste des boites")}}

    </x-slot>

<div class="container-fluid">
    <a href="{{ route('boites.create') }}" class="btn btn-primary">{{ __('Créer une Boite') }}</a>
    <livewire:index-boites

     hideable="select"
    exportable/>

</div>



</x-admin-lte-layout>
