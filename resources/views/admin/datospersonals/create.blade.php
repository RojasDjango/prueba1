@extends('tablar::auth.layout')
@section('title', 'datospersonals/create')
@section('content_header')
    @livewireStyles
    
@endsection
@section('content')
<div class="container container-tight py-4">
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">COMPLETAR SU INFORMACIÓN</h2>
                @livewire('admin.datospersonals.create-form')
                @livewireScripts    
        </div>    
    </div>
            {{-- <div class="text-center text-muted mt-3">
                Ya completaste tu información? <a href="{{route('login')}}" tabindex="-1">Ingresar a tus activiades</a>
            </div> --}}
        
    </div>
@endsection

@section('scripts')

@endsection