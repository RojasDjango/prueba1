<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Lista de Eventos 
                    </div>
                    <h2 class="page-title">
                        hola
                    </h2>
                </div>
                {{-- crear --}}
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @can('admin.capacitaciones.create')
                            <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
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
                            <h3 class="card-title">Lista de Eventos a Desarrollar</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    <button wire:click ="updatePerPageEvento" class="btn btn-primary btn-sm">Aplicar</button>
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" wire:model="customPerPage" wire:keydown.enter="updatePerPage"
                                        min="1" max="100" class="form-control form-control-sm"  size="3"
                                        aria-label="Invoices count" placeholder="Ej:15">
                                    </div>
                                </div>
                                <div class="ms-auto text-muted">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input wire:model.live="searchDepEvento" type="text" class="form-control form-control-sm"
                                        aria-label="searchDepEvento invoice" placeholder="Departamento">
                                    </div>
                                    <div class="ms-2 d-inline-block">
                                        <input wire:model.live="searchProEvento" type="text" class="form-control form-control-sm"
                                        aria-label="searchProEvento invoice" placeholder="Provincia">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <th class="w-1">No.
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
                                    <th>Evento</th>
                                    <th>Fecha</th>
                                    <th>Codigo del Evento</th>
                                    <th>Lugar Departamento</th>
                                    <th>Provincia</th>
                                    <th>Detalle</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td></td>
                                            <td>{{ $evento->id }}</td>
                                            <td>{{ $evento->name }}</td>
                                            <td>{{ $evento->fecha }}</td>
                                            <td>{{ $evento->codigo_evento }}</td>
                                            <td>{{ $evento->departamento->name }}</td>
                                            <td>{{ $evento->provincia->name }}</td>
                                            <td>{{ $evento->detalle }}</td>
                                            <td>
                                                @can('admin.eventos.edit')
                                                    <a href="{{ route('admin.eventos.edit',$evento) }}"  class="btn btn-success btn-sm">Editar</a>
                                                @endcan
                                                
                                            </td>
                                            <td>
                                                @can('admin.capacitaciones.destroy')
                                                    <form action="{{ route('admin.eventos.destroy',$evento) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
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
                                <ul class="pagination m-0 ms-auto">
                                  {{ $eventos->links() }}
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
