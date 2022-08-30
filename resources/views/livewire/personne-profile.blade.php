<div>
    <div class="w-50" style="margin: auto;">
        <x-adminlte-profile-widget name="{{ $personne->nom . ' ' . $personne->prenom }}" desc="{{ $personne->fonction }}"
            theme="lightblue" img="{{Storage::disk('public')->url('personne.jpg')}}" layout-type="classic" >

            <x-adminlte-profile-col-item class="border-right text-dark" icon="fas fa-lg fa-tasks" title="{{ 'Téléphone' }}"
                text="{{ $personne->phone }}" size=6 />
            <x-adminlte-profile-col-item class="text-dark" icon="fas fa-lg fa-tasks" title="{{ 'Adresse' }}"
                text="{{ $personne->adress }}" size=6 />
            <x-adminlte-profile-row-item icon="fas fa-fw fa-arrow-up  text-green" title="{{'Incomes'}}"
            text="{{$personne->incomes->sum('total')}} {{__('Da')}}" badge="green" class="text-xl"/>
            <x-adminlte-profile-row-item icon="fas fa-fw fa-arrow-down  text-red" title="{{'Depenses'}}"
            text="{{$personne->depenses->sum('total')}} {{__('Da')}}"  badge="danger" class="text-xl"/>
            <x-adminlte-profile-row-item icon="fas fa-fw fa-coins " title="{{'Avoir'}}"
            text="{{$personne->transactions->sum('total')}} {{__('Da')}}"  class="text-xl"/>
            <div>
                <a href="{{route('generatePersonne',$personne->id)}}">
                 <x-adminlte-button type="button" label="{{__('Imprimer en pdf')}}"  theme="success" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"/>
                </a>
            </div>
        </x-adminlte-profile-widget>

    </div>
</div>
