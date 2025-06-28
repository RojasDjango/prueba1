@extends('tablar::page')
@section('title', 'Roles/provincial/index')
@section('content_header')
    <h1>Roles - Provincial</h1>
@endsection
@section('content')

    @livewire('admin.roles.provincial.rolprovincial-index')

@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
<script>
    //para que el checkbox se quede fijado con lo que se marque
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