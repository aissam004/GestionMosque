

@extends('adminlte::page')

@section('content_header')
    <h1>{{$header}}</h1>
@stop

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
@stop
@section('content')

<div>

    {{ $slot }}


</div>

@stop
@section('js')
    @livewireScripts
    <script defer src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/prism.js') }}"></script>
    @stack('scripts')
@stop
