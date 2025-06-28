<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            

            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                    Lista de Actividades de los Militantes
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
            
                    <div class="btn-list">
                        {{-- cargar cambios  --}}
                        <button class="btn btn-primary d-none d-sm-inline-block"
                        wire:click="saveChanges">
                        {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report"> --}}

                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        {{-- simbolo más --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Guardar Cambios

                        {{-- </a> --}}
                        </button>

                        {{-- actualizar a todo el personal en la base actividad --}}
                        <button class="btn btn-success d-none d-sm-inline-block"
                        wire:click="cargarDatosAutomaticamente">
                        {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report"> --}}

                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        {{-- simbolo más --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Cargar Militantes

                        {{-- </a> --}}
                        </button>
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
                        
                        {{-- //fecha actual --}}
                        <div class="card-header">
                            <h3 class="card-title">Seguimiento</h3>
                            <input 
                                type="date" 
                                wire:model="fecha_actual" 
                                class="w-40 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500""
                                @if($fecha_actual) value="{{ $fecha_actual }}" @endif
                            readonly>
                        </div>
                            <!-- Mensajes flash -->
                            {{-- //mensaje de confirmacion --}}
                            @if(session()->has('success'))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if(session()->has('info'))
                                <div class="alert alert-important alert-info alert-dismissible" role="alert">
                                    {{ session('info') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible alert-dismissible" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    <button wire:click="updatePerPage" class="btn btn-primary btn-sm">Aplicar</button>
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" wire:model="customPerPage" wire:keydown.enter="updatePerPage"
                                        min="1" max="100" class="form-control form-control-sm"  size="3"
                                               aria-label="Invoices count" placeholder="Ej:25">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input wire:model.live="searchcomando" type="text" class="form-control form-control-sm"
                                        aria-label="searchcomando invoice" placeholder="comando" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                {{-- <th class="w-1">No.
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <polyline points="6 15 12 9 18 15"/>
                                    </svg>
                                </th> --}}
                                <th>Id</th>
                                
                                <th>Nombre</th>
                                <th>Ap.Ptno</th>
                                <th>Ap.Mtno</th>
                                <th>Cell</th>
                                <th>Facebook</th>
                                <th>Youtube</th>
                                <th>TikTok</th>
                                <th>x</th>
                                <th>Kick</th>
                                <th>Evto 1</th>
                                <th>Evto 2</th>
                                <th>Evto 3</th>
                                <th>Evto 4</th>
                                <th>Evto 5</th>
                                <th>Comando</th>
                            </thead>
                            <tbody>
                                @foreach ($actividads as $actividad)
                                <tr>
                                    <!-- Campos normales -->
                                    <td>{{ $actividad->id }}</td>
                                    <td>{{ $actividad->datospersonal?->user?->name ?? 'N/A' }}</td>
                                    <td>{{ $actividad->datospersonal?->user?->apellido_paterno ?? 'N/A' }}</td>
                                    <td>{{ $actividad->datospersonal?->user?->apellido_materno ?? 'N/A' }}</td>
                                    <td>{{ $actividad->datospersonal?->user?->celular ?? 'N/A' }}</td>
                                    
                                    <!-- Campos booleanos como checkboxes (individualmente) -->
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'facebook')"
                                            {{ $editedActividads[$actividad->id]['facebook'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'youtube')"
                                            {{ $editedActividads[$actividad->id]['youtube'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'tiktok')"
                                            {{ $editedActividads[$actividad->id]['tiktok'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'x')"
                                            {{ $editedActividads[$actividad->id]['x'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'kick')"
                                            {{ $editedActividads[$actividad->id]['kick'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'evento_1')"
                                            {{ $editedActividads[$actividad->id]['evento_1'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'evento_2')"
                                            {{ $editedActividads[$actividad->id]['evento_2'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'evento_3')"
                                            {{ $editedActividads[$actividad->id]['evento_3'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'evento_4')"
                                            {{ $editedActividads[$actividad->id]['evento_4'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" 
                                            wire:click="toggleField({{ $actividad->id }}, 'evento_5')"
                                            {{ $editedActividads[$actividad->id]['evento_5'] ?? false ? 'checked' : '' }}>
                                    </td>
                                    
                                    <td>{{ $actividad->datospersonal?->ejecutora?->name ?? 'N/A' }}</td>
                                </tr>
                            @endforeach



                                {{-- @foreach ($actividads as $actividad)
                                    <tr>
                                        <td>{{ $actividad->id }}</td>
                                        <td>{{ $actividad->datospersonal->user->name }}</td>
                                        <td>{{ $actividad->datospersonal->user->apellido_paterno }}</td>
                                        <td>{{ $actividad->datospersonal->user->apellido_materno }}</td>
                                        <td>{{ $actividad->datospersonal->user->celular }}</td>
                                        <td>{{ $actividad->facebook }}</td>
                                        <td>{{ $actividad->youtube }}</td>
                                        <td>{{ $actividad->tiktok }}</td>
                                        <td>{{ $actividad->x }}</td>
                                        <td>{{ $actividad->kick }}</td>
                                        <td>{{ $actividad->evento_1 }}</td>
                                        <td>{{ $actividad->evento_2 }}</td>
                                        <td>{{ $actividad->evento_3 }}</td>
                                        <td>{{ $actividad->evento_4 }}</td>
                                        <td>{{ $actividad->evento_5 }}</td>
                                        <td>{{ $actividad->datospersonal->ejecutora->name }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                        {{-- //form-footer --}}
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Batalla.Perú</p>
                            <ul class="pagination m-0 ms-auto">
                            {{ $actividads->links() }}
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
