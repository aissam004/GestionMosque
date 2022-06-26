

@extends('adminlte::page')

@section('content_header')
    <h1>{{$header}}</h1>
@stop

@section('css')
    @livewireStyles

    @stack('cssFile')
@stop
@section('content')

<div>

    {{ $slot }}


</div>

@stop
@section('js')
    @livewireScripts
    <script defer src="{{ mix('js/app.js') }}"></script>

    @stack('scripts')
@stop
