@extends('tablar::page')
@section('title', 'datospersonals/index')
@section('content_header')

    
@endsection
@section('content')
    {{-- //mensaje de confirmacion --}}
    <div>
        @if (session()->has('success1'))
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                {{ session('success1') }}
            </div>
        @endif
    </div>
    
        
    @livewire('admin.datospersonals.nacional-index')
    
@endsection

@section('scripts')
    
@endsection