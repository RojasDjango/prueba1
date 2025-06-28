@extends('tablar::page')
@section('title', 'datospersonals/editar')
@section('content_header')
    <h1>Datos para Editar</h1>
@endsection
@section('content')
    @livewire('admin.datospersonals.edit-form', ['datospersonal' => $datospersonal])
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script></script>
@endsection