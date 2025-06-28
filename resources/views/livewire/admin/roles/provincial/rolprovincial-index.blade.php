<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Lista de Roles Provincia
                    </div>
                    <h2 class="page-title">
                        hola
                    </h2>
                </div>
                {{-- crear --}}
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{-- <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary d-none d-sm-inline-block" > --}}
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            {{-- simbolo más --}}
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear nuevo
                        </a> --}}
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
                            <h3 class="card-title">Lista de Roles de Provincias</h3>
                        </div>
                        <div class ="card-body border-bottom py-3">
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
                                        <input wire:model.live="searchroles" type="text" class="form-control form-control-sm"
                                        aria-label="searchDepEvento invoice" placeholder="DNI">
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
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
                                        <th>Departamento</th>
                                        <th>Comando</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                {{-- //es para que el checkbox persista y no se borre al actualizar --}}
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" data-invoice-id="{{ $user->id }}"
                                                    x-data="checkboxPersist"></td>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->DNI }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->apellido_paterno }}</td>
                                                <td>{{ $user->apellido_materno }}</td>
                                                <td>{{ $user->datospersonals->departamento->name}}</td>
                                                <td>{{ $user->ejecutora->nivel }}</td>
                                                <td>
                                                        {{-- //no modificar si es de si mismo --}}
                                                        @if (auth()->user()->id == $user->id)
                                                            <span class="text-muted">No Editar</span>
                                                        @else
                                                            <a href="{{ route('admin.users.edit',$user) }}"  class="btn btn-success btn-sm">Editar</a>
                                                        @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p class="m-0 text-muted">Batalla.Perú</p>
                                <ul class="pagination m-0 ms-auto">
                                  {{ $users->links() }}
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
