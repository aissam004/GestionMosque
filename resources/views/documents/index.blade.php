

@push('cssFile')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush
<x-admin-lte-layout>
    <x-slot name="header">

        {{__("Liste des Documents")}}

    </x-slot>

<div class="container-fluid">



    <livewire:show-documents
    hideable="select"
    model="App\Models\Document"
   exportable
   />


</div>



</x-admin-lte-layout>
