

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">
        @if ($all)
         {{__("Transactions")}}
        @elseif($isincome)
          {{__("Incomes")}}
        @else
          {{__("Depenses")}}
        @endif


    </x-slot>

<div class="container-fluid">

    <livewire:transactions-total
    :all="$all"
    :isincome="$isincome">

    <div class="m-2">

        <a href="{{route('generateTransactions',[$all,$isincome])}}">
         <x-adminlte-button type="button" label="{{__('Imprimer en pdf')}}"  theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
        </a>
    </div>

    <div class="container-fluid">
        <livewire:transactions-table
        hideable="select"
        exportable
        :all="$all"
        :isincome="$isincome"/>


    </div>



</div>



</x-admin-lte-layout>
