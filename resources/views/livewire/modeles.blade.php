
<div>

    <div wire:ignore>
    <x-adminlte-select name="type" label='{{ __("type") }}' label-class="text-lightblue" wire:model="type_id">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option selected disabled value="null">{{ __('select type') }}</option>
    @foreach ($types as $type)
    <option selected value="{{ $type->id }}" >{{ $type->title }}</option>
    @endforeach

</x-adminlte-select2>
</div>
<div wire:ignore>
<x-adminlte-select name="marque" label='{{ __("marque") }}' label-class="text-lightblue" wire:model="marque_id">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option  disabled value="null">{{ __('select marque') }}</option>
    @foreach ($marques as $marque)
    <option value="{{ $marque->id }}"  >{{ $marque->name }}</option>
    @endforeach
</x-adminlte-select2>
</div>



<x-adminlte-select name="modele" label='{{ __("modele") }}' label-class="text-lightblue" wire:model="modele_id" required>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fab fa-apple"></i>
                </div>
            </x-slot>

            <option selected disabled value="null">{{ __('select modele') }}</option>

            @foreach ($modeles as $modele)
            <option value="{{ $modele->id }}"  >{{ $modele->title }}</option>
            @endforeach
            @if (count($modeles)==0)
                <optgroup label="{{ __('aucun modele trouvé') }}"> </optgroup>
           @endif
</x-adminlte-select2>



</div>
