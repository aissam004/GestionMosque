
<div>
    @php
    $config = [
        "allowClear" => true,
    ];
    @endphp

    <x-adminlte-select2 name="type" label='{{ __("type") }}' label-class="text-lightblue"
    data-placeholder='{{ __("select type") }}' :config="$config">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option/>

    @foreach ($types as $type)
    <option value="{{ $type->id }}">{{ $type->title }}</option>
    @endforeach
</x-adminlte-select2>

<select name="type1" id="" wire:model="type1">
    <option value="hi">hi</option>

    </select>
{{ $type1 }}
<x-adminlte-select2 name="marque" label='{{ __("marque") }}' label-class="text-lightblue"
    data-placeholder='{{ __("select marque") }}' :config="$config">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option/>
    @foreach ($marques as $marque)
    <option value="{{ $marque->id }}">{{ $marque->name }}</option>
    @endforeach
</x-adminlte-select2>

    <x-adminlte-select2 name="modele" label='{{ __("modele") }}' label-class="text-lightblue"
            data-placeholder='{{ __("select modele") }}'  >
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fab fa-apple"></i>
                </div>
            </x-slot>
            <option/>
            @foreach ($modeles as $modele)
            <option value="{{ $modele->id }}">{{ $modele->title }}</option>
            @endforeach
        </x-adminlte-select2>



</div>
