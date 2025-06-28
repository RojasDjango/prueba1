<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Lista de comandos
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
            
                        <a href="{{ route('admin.ejecutoras.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
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
                            <h3 class="card-title">Ver Comando Registrado</h3>
                        </div>
                        {{-- //mensaje de confirmacion --}}
                            @if (session()->has('success'))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif

                            {{-- mensaje de error --}}
                            @error('user_id')
                            <div class="alert alert-important alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                            
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    <button wire:click ="updatePerPageEjecutora" class="btn btn-primary btn-sm">Aplicar</button>
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" wire:model="customPerPage" wire:keydown.enter="updatePerPage"
                                        min="1" max="100" class="form-control form-control-sm"  size="3"
                                        aria-label="Invoices count" placeholder="Ej:15">
                                    </div>
                                </div>
                                <div class="ms-auto text-muted">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input wire:model.live="searchcomando" type="text" class="form-control form-control-sm"
                                        aria-label="searchdepartamento invoice" placeholder="Nombre Comando">
                                    </div>
                                    <div class="ms-2 d-inline-block">
                                        <input wire:model.live="searchejecunivel" type="text" class="form-control form-control-sm"
                                        aria-label="searchdepartamento invoice" placeholder="Alcance del Comando">
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
                                    <th>
                                        <a wire:click.prevent="sortBy('id')" href="#">
                                            ID
                                                    @if ($sortField == 'id')
                                                        @if ($sortDirection == 'asc')
                                                            ↑
                                                        @else
                                                            ↓
                                                        @endif
                                                    @endif
                                        </a>
                                    </th>
                                    <th>DNI</th>
                                    <th>Nombre Coordinador</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    
                                    <th>Telefono</th>
                                    <th>
                                        <a wire:click.prevent="sortBy('name')" href="#">
                                            Comando
                                            @if ($sortField == 'name')
                                                @if ($sortDirection == 'asc')
                                                    ↑
                                                @else
                                                    ↓
                                                @endif
                                            @endif
                                        </a>
                                        
                                    </th>
                                    <th>Alcance del Comando</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                    @foreach ($ejecutoras as $ejecutora)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                            <td>{{ $ejecutora->id }}</td>
                                            <td>{{ $ejecutora->user->DNI }}</td>
                                            <td>{{ $ejecutora->user->name }}</td>
                                            <td>{{ $ejecutora->user->apellido_paterno }}</td>
                                            <td>{{ $ejecutora->user->apellido_materno }}</td>
                                            
                                            <td>{{ $ejecutora->user->celular }}</td>
                                            <td>{{ $ejecutora->name }}</td>
                                            <td>{{ $ejecutora->nivel }}</td>
                                            <td>
                                                {{-- para que no modifique al de nivel superior --}}
                                                @if (in_array($ejecutora->nivel,['Desarrollador']))
                                                                
                                                @else

                                                    {{-- //****** no carga editar si es usuario autentificado, para que solicite
                                                    //al ente superiro para su modificación ****--}}
                                                    @if (auth()->user()->id == $ejecutora->user->id)
                                                        <span class="text-muted">No Editar</span>
                                                    @else
                                                        <a href="{{ route('admin.ejecutoras.edit',$ejecutora) }}"  class="btn btn-success btn-sm">Editar</a>
                                                    @endif
                                                    {{-- *****fin ******* --}}
                                                @endif
                                            </td>
                                            <td>
                                                {{-- para que no modifique al de nivel superior --}}
                                                @can('admin.ejecutoras.destroy')
                                                <form action="{{ route('admin.ejecutoras.destroy',$ejecutora) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
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
                            {{ $ejecutoras->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

