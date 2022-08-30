

                        @php
                        $config = [
                            "placeholder" => "Selectionner multiple tags...",

                            //"allowClear" => true,
                            "tags"=> true
                        ];
                    @endphp
                    <x-adminlte-select2 id="tags" name="tags_id" label='{{ __("Tags") }}' fgroup-class="ml-2"
                        label-class="text-lightblue" igroup-size="sm" style="width: 200px;" class="tags" wire:model.defer="tags_id[]" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>

                        @if (is_array($tags) || is_object($tags))
                        @foreach ($tags as $tag)
                            <option   value="{{ $tag->name }}" >{{ $tag->name }}</option>
                            @endforeach
                        @endif
                    </x-adminlte-select2>
