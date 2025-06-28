<div>
    <div>
        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <!-- Page pre-title -->
                  <div class="page-pretitle">
                      Lista de Simpatizantes / Militantes Provincial
                  </div>
                  <h2 class="page-title">
                      Dashboard
                  </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                    {{-- <span class="d-none d-sm-inline">
                      <a href="#" class="btn btn-white">
                      New view
                      </a>
                    </span> --}}
          
                      {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                      data-bs-target="#modal-report">
                          
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <line x1="12" y1="5" x2="12" y2="19"/>
                              <line x1="5" y1="12" x2="19" y2="12"/>
                          </svg>
                          Crear nuevo
                      </a> --}}
          
                      {{-- <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                         data-bs-target="#modal-report" aria-label="Create new report">
                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <line x1="12" y1="5" x2="12" y2="19"/>
                              <line x1="5" y1="12" x2="19" y2="12"/>
                          </svg>
                      </a> --}}
                  </div>
                </div>
                </div>
            </div>
          </div>
          
          
          <!-- Page body -->
          <div class="page-body">
            <div class="container-xl">
              <div class="row row-deck row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Mensaje: !No Editar Ni Eliminar, a comandos que no esten bajo su coordinación! </h3>
                    </div>
                      {{-- //mensaje de confirmacion --}}
                      @if (session()->has('success'))
                      <div class="alert alert-important alert-success alert-dismissible" role="alert">
                          {{ session('success') }}
                      </div>
                      @endif
                    <div class="card-body border-bottom py-3">
                      <div class="d-flex">
                          <div class="text-muted">
                              <button wire:click="updatePerPage" class="btn btn-primary btn-sm">Aplicar</button>
                              <div class="mx-2 d-inline-block">
                                  <input type="text" wire:model="customPerPage" wire:keydown.enter="updatePerPage"
                                  min="1" max="100" class="form-control form-control-sm"  size="3"
                                         aria-label="Invoices count" placeholder="Ej:15">
                              </div>
                              entries
                          </div>
                          <div class="ms-auto text-muted">
                              Search:
                                <div class="ms-2 d-inline-block">
                                <input wire:model.live="searchdepartamento" type="text" class="form-control form-control-sm"
                                    aria-label="searchdepartamento invoice" placeholder="Departamento" readonly>
                                </div>
                                <div class="ms-2 d-inline-block">
                                <input wire:model.live="searchprovincia" type="text" class="form-control form-control-sm"
                                    aria-label="searchprovincia invoice" placeholder="Provincia" readonly>
                                </div>
                                <div class="ms-2 d-inline-block">
                                <input wire:model.live="searchdistrito" type="text" class="form-control form-control-sm"
                                    aria-label="searchdistrito invoice" placeholder="Distrito">
                                </div>
                                <div class="ms-2 d-inline-block">
                                <input wire:model.live="searchcomando" type="text" class="form-control form-control-sm"
                                    aria-label="searchcomando invoice" placeholder="Comando">
                                </div>
        
                          </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      {{-- tabla --}}
                      <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                          {{-- cabeza --}}
                          {{-- <tr>
                            <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                            aria-label="Select all invoices"></th>
                          </tr> --}}
                         
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
                          <th>Nombre</th>
                          <th>Ap Paterno</th>
                          <th>Ap Materno</th>
                          <th>
                            <a wire:click.prevent="sortBy('departamento_id')" href="#">
                                Departamento
                                        @if ($sortField == 'departamento_id')
                                            @if ($sortDirection == 'asc')
                                                ↑
                                            @else
                                                ↓
                                            @endif
                                        @endif
                            </a>
                          </th>
                          <th>
                            <a wire:click.prevent="sortBy('provincia_id')" href="#">
                                Provincia
                                        @if ($sortField == 'provincia_id')
                                            @if ($sortDirection == 'asc')
                                                ↑
                                            @else
                                                ↓
                                            @endif
                                        @endif
                            </a>
                          </th>
                          <th>
                            <a wire:click.prevent="sortBy('distrito_id')" href="#">
                                Distrito
                                        @if ($sortField == 'distrito_id')
                                            @if ($sortDirection == 'asc')
                                                ↑
                                            @else
                                                ↓
                                            @endif
                                        @endif
                            </a>
                          </th>
                          <Th>Teléfono</Th>
                          <th>
                            <a wire:click.prevent="sortBy('ejecutora_id')" href="#">
                                comando
                                        @if ($sortField == 'ejecutora_id')
                                            @if ($sortDirection == 'asc')
                                                ↑
                                            @else
                                                ↓
                                            @endif
                                        @endif
                            </a>
                          </th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                          <th></th>
                          {{-- fin de cabeza --}}
                        </thead>
                        <tbody>
                          {{-- inicio de cuerpo --}}
                          @foreach ($datopersonals as $datospersonal)
                              <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                  aria-label="Select invoice"></td>
                                  <td>{{ $datospersonal->id }}</td>
                                <td>{{ $datospersonal->user->DNI }}</td>
                                <td>{{ $datospersonal->user->name }}</td>
                                <td>{{ $datospersonal->user->apellido_paterno }}</td>
                                <td>{{ $datospersonal->user->apellido_materno }}</td>
                                <td>{{ $datospersonal->departamento->name }}</td>
                                <td>{{ $datospersonal->provincia->name }}</td>
                                <td>{{ $datospersonal->distrito->name }}</td>
                                <td>{{ $datospersonal->user->celular }}</td>
                                <td>{{ $datospersonal->ejecutora->name }}</td>
                                <td>
                                  {{-- para que no modifique al de nivel superior --}}
                                  @if (in_array($datospersonal->ejecutora?->nivel,['Desarrollador','Nacional','Regional']))
                                      
                                  @else
                                    @if (auth()->user()->id == $datospersonal->user_id)
                                      <span class="text-muted">No Editar</span>
                                    @else
                                      <a href="{{ route('admin.datospersonals.edit',$datospersonal) }}" class="btn btn-success btn-sm">Editar</a>
                                    @endif
                                    
                                  @endif
                                  
                                </td>
                                <td>
                                  {{-- para que no modifique al de nivel superior --}}
                                  @if (in_array($datospersonal->ejecutora?->nivel,['Desarrollador','Nacional','Regional']))
                                      
                                  @else
                                    <form action="{{ route('admin.datospersonals.destroy',$datospersonal) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                  @endif
                                  
                                </td>
                              </tr>
                          @endforeach
                          {{-- fin de cuerpo --}}
                        </tbody>
                      </table>
                      {{-- fin de tabla --}}
                    </div>
                    {{-- //form-footer --}}
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Batalla.Perú</p>
                        <ul class="pagination m-0 ms-auto">
                          {{ $datopersonals->links() }}
                        </ul>
                        
                    </div>
                    
                  </div>
          
                </div>
              </div>
            </div>
        
        </div>
        
</div>

