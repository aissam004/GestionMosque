@push('cssFile')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{ __('Materiels') }}
        <div>


        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="flex flex-row flex-wrap justify-around">

                <x-adminlte-card title="{{__('Liste des positions')}}" theme="dark" icon="fas fa-lg fa-moon">
                    <livewire:positions-table />

                </x-adminlte-card>

                <x-adminlte-card title="{{__('Liste des types')}}" theme="dark" icon="fas fa-lg fa-moon">
                    <livewire:types-table />
                </x-adminlte-card>

                <x-adminlte-card title="{{__('Liste des marques')}}" theme="dark" icon="fas fa-lg fa-moon">
                    <livewire:marques-table />
                </x-adminlte-card>
                <x-adminlte-card title="{{__('Liste des états')}}" theme="dark" icon="fas fa-lg fa-moon">
                    <livewire:etats-table />
                </x-adminlte-card>






        </div>


    </div>

</x-admin-lte-layout>
