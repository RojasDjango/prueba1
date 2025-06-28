@extends('tablar::page')
@section('title', 'capacitaciones/index')
@section('content_header')

    
@endsection
@section('content')
        
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Lista de Capacitaciones 
                </div>
                <h2 class="page-title">
                    hola
                </h2>
            </div>
            {{-- Modal --}}
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                  {{-- <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                    New view
                    </a>
                  </span> --}}
                    @can('admin.capacitaciones.create')
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" 
                        data-bs-toggle="modal" data-bs-target="#modal-capacitacion">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            {{-- simbolo más --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear nuevo
                        </a>
                    @endcan
                    
                </div>
            </div>

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Capacitación</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                <button class="btn btn-primary btn-sm"></button>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <th class="w-1">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 15 12 9 18 15"/>
                                    </svg>
                                </th>
                                <th>Id</th>                    
                                <th>Tema</th>
                                <th>Alcance</th>
                                <th>Enlace</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach ($capacitaciones as $capacitacion)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                            aria-label="Select invoice"></td>
                                        <td>{{ $capacitacion->id }}</td>
                                        <td>{{ $capacitacion->tema }}</td>
                                        <td>{{ $capacitacion->alcance }}</td>
                                        {{-- <td>{{ $capacitacion->enlace }}</td> --}}
                                        <td>
                                            <a href="{{ $capacitacion->enlace }}" target="_blank" class="text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                                    <line x1="10" y1="14" x2="20" y2="4" />
                                                    <polyline points="15 4 20 4 20 9" />
                                                </svg>
                                                Ver enlace
                                            </a>
                                        </td>
                                        <td>{{ $capacitacion->fecha }}</td>
                                        <td>{{ $capacitacion->descripción }}</td>
                                        <td>
                                            @can('admin.capacitaciones.edit')
                                                <a href="{{ route('admin.capacitaciones.edit',$capacitacion) }}" class="btn btn-success btn-sm">Editar</a>
                                            @endcan
                                            
                                        </td>
                                        <td>
                                            @can('admin.capacitaciones.destroy')
                                                <form action="{{ route('admin.capacitaciones.destroy',$capacitacion) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            @endcan
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Batalla.Perú</p>
                        {{-- <ul class="pagination m-0 ms-auto">
                            {{ $capacitaciones->links() }}
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('admin.capacitaciones.partials.capacitacionform')
@endsection

@section('scripts')
    
@endsection