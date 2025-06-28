@extends('tablar::page')
@section('title', 'datospersonals/distrito/index')
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
    @livewire('admin.datospersonals.distrito.dist-index')
    
@endsection

@section('scripts')
    
@endsection