@extends('tablar::page')
@section('title', 'datospersonals/editar')
@section('content_header')
    <h1>Datos para Editar</h1>
    @livewireStyles
    

@endsection
@section('content')
    @livewire('admin.ejecutoras.vercomando.vercom-index')
    
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script></script>
@endsection