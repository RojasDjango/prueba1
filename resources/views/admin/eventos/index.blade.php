@extends('tablar::page')
@section('title', 'eventos/index')
@section('content_header')
    <h1>Datos del index de eventos</h1>
    @livewireStyles
    

@endsection
@section('content')
    @livewire('admin.eventos.evento-index')
    
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script></script>
@endsection