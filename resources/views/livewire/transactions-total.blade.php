<div>
    <div class="flex flex-row flex-wrap justify-around ">
        @if ($all)
        <div  style="width: 400px"><i class="fa-solid fa-hand-holding-dollar"></i>
            <x-adminlte-small-box title="{{$total}} {{__('DA')}}" text="{{__('Solde')}}" icon="fas fa-coins text-orange" theme="gradient-navy" />
        </div>
        @endif
        @if ($all || !$all && $isincome)
        <div  style="width: 400px">
            @if(Route::is('incomes'))
            <x-adminlte-small-box title="{{$incomes}} {{__('DA')}}" text="{{__('Incomes')}}" icon="fas fa-lg fa-download" theme="gradient-teal" />
            @else
            <x-adminlte-small-box title="{{$incomes}} {{__('DA')}}" text="{{__('Incomes')}}" icon="fas fa-lg fa-download" theme="gradient-teal" url="{{route('incomes')}}" />

            @endif
        </div>
        @endif
        @if ($all || !$all && !$isincome)
        <div  style="width: 400px">
            @if(Route::is('depenses'))
            <x-adminlte-small-box title="{{$depenses}} {{__('DA')}}" text="{{__('Depenses')}}" icon="fas fa-lg fa-upload" theme="gradient-danger" />
            @else
            <x-adminlte-small-box title="{{$depenses}} {{__('DA')}}" text="{{__('Depenses')}}" icon="fas fa-lg fa-upload" theme="gradient-danger" url="{{route('depenses')}}"/>
            @endif
        </div>
        @endif
    </div>

</div>
