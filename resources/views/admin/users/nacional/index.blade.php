@extends('tablar::page')
@section('title', 'Roles/Nacional/index')
@section('content_header')
    <h1>roles nacional</h1>
@endsection
@section('content')

    @livewire('admin.roles.nacional.rolnacional-index')

@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    {{-- //para que no se borre el checkbox cuando se actualiza la pagina  --}}
<script>
    document.addEventListener('alpine:init', function() {
        Alpine.data('checkboxPersist', () => ({
            init() {
                // Restaurar estado al cargar
                this.$el.checked = localStorage.getItem(`invoice_${this.$el.dataset.invoiceId}`) === 'true';
                
                // Escuchar cambios
                this.$el.addEventListener('change', () => {
                    localStorage.setItem(`invoice_${this.$el.dataset.invoiceId}`, this.$el.checked);
                });
            }
        }));
    });
</script>
@endsection