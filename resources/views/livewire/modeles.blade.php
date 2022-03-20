
<div>

    <div wire:ignore>
    <x-adminlte-select id="type_id" class="select-modeles" name="type" label='{{ __("type") }}' label-class="text-lightblue" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option  @if($type_id==null) selected @endif disabled value="null">{{ __('select type') }}</option>
    @foreach ($types as $type)
    <option @if($type->id==$type_id) selected @endif  value="{{ $type->id }}" >{{ $type->title }}</option>
    @endforeach
</x-adminlte-select>
</div>
<div wire:ignore>
<x-adminlte-select id="marque_id" name="marque" class="select-modeles" label='{{ __("marque") }}' label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fab fa-apple"></i>
        </div>
    </x-slot>
    <option  @if($marque_id==null) selected @endif disabled value="null">{{ __('select marque') }}</option>
    @foreach ($marques as $marque)
    <option @if($marque->id==$marque_id) selected @endif value="{{ $marque->id }}"  >{{ $marque->name }}</option>
    @endforeach
</x-adminlte-select>
</div>
<x-adminlte-select  name="modele" id="modele_id"  label='{{ __("modele") }}' label-class="text-lightblue"  >
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fab fa-apple"></i>
                </div>
            </x-slot>
            <option selected disabled>{{ __('select modele') }}</option>
            @foreach ($modeles as $modele)
            <option @if($modele->id==$modele_id) selected @endif  value="{{ $modele->id }}"  >{{ $modele->title }}</option>
            @endforeach
            @if (count($modeles)==0)
                <optgroup label="{{ __('aucun modele trouvé') }}"> </optgroup>
           @endif
</x-adminlte-select>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select-modeles').each(function()  {
                let elementName = $(this).attr('id');
                @this.set(elementName, this.value);

            });

            $('.select-modeles').on('change', function (e) {
                let elementName = $(this).attr('id');
                @this.set(elementName, this.value);
            });
        });
    </script>
@endpush

</div>
