
@push('cssFile')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{ __('Materiels') }}
        <div>
            <a href="{{ route('generateListeMateriels') }}">
                <x-adminlte-button type="button" label="{{ 'imprimer en pdf' }}" theme="success"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" />
            </a>



        </div>
    </x-slot>

    <div class="container-fluid">

        <livewire:index-materiels hideable="select" exportable />

    </div>


</x-admin-lte-layout>
