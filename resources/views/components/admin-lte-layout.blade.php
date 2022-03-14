

@extends('adminlte::page')

@section('content_header')
    <h1>{{$header}}</h1>
@stop

@section('content')

<div>
    {{ config('adminlte.title') }}
    {{ $slot }}
    

</div>

@stop

