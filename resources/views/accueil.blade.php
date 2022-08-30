@section('plugins.Chartjs', true)

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
@endpush



<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Accueil")}}

    </x-slot>

<div class="container-fluid">

    <livewire:transactions-total
    :all="true"
    :isincome="true">

    <div class="flex flex-row flex-row">
        <div class="col-md-4">
                <x-adminlte-small-box title="{{$incomesMonth}} {{__('DA')}}" text="{{__('Incomes')}} {{__('pour le mois')}} {{__(date('F'))}}" icon="fas fa-lg fa-arrow-up text-yellow" theme="gradient-teal" />
        </div>

        <div class="col-md-4">
            <x-adminlte-small-box title="{{$depensesMonth}} {{__('DA')}}" text="{{__('Depenses')}} {{__('pour le mois')}} {{__(date('F'))}}" icon="fas fa-lg fa-arrow-down text-black" theme="gradient-danger" />
        </div>
    </div>

    <div style="width:75%;">
        {!! $chartjs->render() !!}
    </div>



</div>



</x-admin-lte-layout>
