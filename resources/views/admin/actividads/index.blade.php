@extends('tablar::page')
@section('title', 'capacitaciones/index')
@section('content_header')

    
@endsection
@section('content')
    @livewire('admin.actividads.actividad-index')
    {{-- @livewire('admin.actividads.cargar-update') --}}
@endsection

@section('scripts')
    
@endsection