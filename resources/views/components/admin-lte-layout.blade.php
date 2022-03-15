

@extends('adminlte::page')

@section('content_header')
    <h1>{{$header}}</h1>
@stop

@section('css')
    @livewireStyles
@stop
@section('content')

<div>

    {{ $slot }}


</div>

@stop
@section('js')
    @livewireScripts
@stop
