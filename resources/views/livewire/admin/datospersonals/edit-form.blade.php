<div class="page-body">
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class=" border-end">
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            {{-- //mensaje --}}
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

                            <h2 class="mb-4">Mi Registro</h2>
                            <h3 class="card-title">Detalle de Perfil</h3>
                                {{-- imagen  --}}
                                <div class="row align-items-center">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <div class="col-auto">
                                    <span class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="btn btn-1"> Cambiar Imagen </a>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="btn btn-ghost-danger btn-3"> Eliminar Imagen </a>
                                    </div>
                                </div>

                                {{-- fin de imagen --}}



                            <!-- Sección de Datos Personales del Usuario -->
                            <h3 class="card-title">Datos Personales</h3>
                            
                            <div class="row g-3">
                                <!-- DNI -->
                                <div class="col-md-3">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" wire:model="dniuser" class="form-control" id="dniuser" required readonly>
                                </div>
                                
                                <!-- Nombre -->
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Nombres</label>
                                    <input type="text" wire:model="nameuser" class="form-control" id="nameuser" required>
                                </div>
                                
                                <!-- Apellido Paterno -->
                                <div class="col-md-3">
                                    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                                    <input type="text" wire:model="apellido_paternouser" class="form-control" id="apellido_paternouser" required>
                                </div>
                                
                                <!-- Apellido Materno -->
                                <div class="col-md-3">
                                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                                    <input type="text" wire:model="apellido_maternouser" class="form-control" id="apellido_maternouser" required>
                                </div>
                                
                                <!-- Celular -->
                                <div class="col-md-3 mt-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" wire:model="celular" class="form-control" id="celular" required>
                                </div>

                                <!-- email -->
                                <div class="col-md-3 mt-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" wire:model="email" class="form-control" id="email" required>
                                </div>
                            </div>







                            

                            <h3 class="card-title mt-4">Nombre del Militante/Sinpatizante</h3>
                            
                            <div class="row g-3">
                                {{-- departamento --}}
                                <div class="col-md">
                                    <label for="selectedDepartamento" class="form-label">Departamento</label>
                                    <select wire:model="selectedDepartamento" class="form-control" id="selectedDepartamento" wire:change="$set('selectedProvincia',null)">
                                        <option value="">Seleccione un departamento</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}" {{ $selectedDepartamento == $departamento->id ? 'selected' : '' }} >
                                                {{-- {{ $departamento->name }} --}}
                                                {{ $departamentos->find($selectedDepartamento)->name ?? 'N/A' }}
                                            </option >
                                        @endforeach
                                    </select>
                                </div>
                                {{-- fin de departamento --}}
                                {{-- provincia --}}
                                <div class="col-md">
                                    <label for="selectedProvincia" class="form-label">Provincia</label>
                                    <select wire:model.live="selectedProvincia" class="form-control" id="selectedProvincia" wire:change="$set('selectedDistrito',null)" @if(!$selectedDepartamento) disabled @endif>
                                        <option value="">Seleccione una provincia</option>
                                        @foreach($provincias as $provincia)
                                            <option value="{{ $provincia->id }}" {{ $selectedProvincia == $provincia->id ? 'selected' : '' }}>
                                                {{ $provincia->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- fin de provincia --}}
                                {{-- distrito --}}
                                <div class="col-md">
                                    <label for="selectedDistrito" class="form-label">Distrito</label>
                                    <select wire:model="selectedDistrito" class="form-control" id="selectedDistrito" @if(!$selectedProvincia) disabled @endif>
                                        <option value="">Seleccione un distrito</option>
                                        @foreach($distritos as $distrito)
                                            <option value="{{ $distrito->id }}" {{ $selectedDistrito == $distrito->id ? 'selected' : '' }}>
                                                {{ $distrito->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Direccion --}}
                                <div class="col-md">
                                    <label for="namedireccion" class="form-label">Dirección</label>
                                    <input type="text" wire:model="namedireccion" class="form-control" id="namedireccion">
                                </div>
                            </div>
                                {{-- fin distrito --}}
                                <h3 class="card-title mt-4">Redes Sociales</h3>
                                <p class="card-subtitle">se muestra sus usuarios y correo electronico.</p>
                            {{-- resto del campo  --}}
                            <div>
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="text" wire:model="facebook" class="form-control" id="facebook">
                                    </div>
                                    
                                    <div class="col-md">
                                        <label for="tiktok" class="form-label">TikTok</label>
                                        <input type="text" wire:model="tiktok" class="form-control" id="tiktok">
                                    </div>
                                    
                                    <div class="col-md">
                                        <label for="youtube" class="form-label">YouTube</label>
                                        <input type="text" wire:model="youtube" class="form-control" id="youtube">
                                    </div>
                                    
                                    <div class="col-md">
                                        <label for="x" class="form-label">X (Twitter)</label>
                                        <input type="text" wire:model="x" class="form-control" id="x">
                                    </div>
                                    
                                    <div class="col-md">
                                        <label for="kick" class="form-label">Kick</label>
                                        <input type="text" wire:model="kick" class="form-control" id="kick">
                                    </div>
                                </div>
                                {{-- fin de resto de campo --}}
                            </div>
                            {{-- comando --}}
                                <h3 class="card-title mt-4">Comando</h3>
                                <p class="card-subtitle">se muestra el nombre del comando al que pertenece.</p>
                            <!-- Select Sector -->
                            <div>
                                <h3 class="card-title mt-4">Sector donde labora</h3>
                                <p class="card-subtitle">se muestra el sector donde labora o laboró.</p>
                                <div class="mb-3">
                                    {{-- <label for="selectedSector" class="form-label">Sector</label> --}}
                                    <select wire:model="selectedSector" class="form-control" id="selectedSector">
                                        <option value="">Seleccione un sector</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}" {{ $selectedSector == $sector->id ? 'selected' : '' }}>
                                                {{ $sector->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            <!-- Select Ejecutora -->
                                <div class="mb-3">
                                    {{-- <label for="selectedEjecutoras" class="form-label">Ejecutora</label> --}}
                                    <label for="selectedEjecutoras" class="form-label">Comando al que pertenece, Ingrese el DNI del Responsable del Comando </label>
                                    <input style="text-transform:uppercase" name="selectedEjecutoras" type="text" 
                                    class="form-control @error('selectedEjecutoras') is-invalid @enderror" 
                                    placeholder="Ingresar DNI"  wire:model="selectedEjecutoras">
                                    @error('selectedEjecutoras')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    {{-- para seleccionar --}}
                                    {{-- <select wire:model="selectedEjecutoras" class="form-control" id="selectedEjecutoras">
                                        <option value="">Seleccione una ejecutora</option>
                                        @foreach($ejecutoras as $ejecutora)
                                            <option value="{{ $ejecutora->id }}" {{ $selectedEjecutoras == $ejecutora->id ? 'selected' : '' }}>
                                                {{ $ejecutora->DNI }}
                                            </option>
                                        @endforeach
                            </select> --}}
                                </div>
                            </div>
                        </form>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Buscar </label>
                                    <button class="btn btn-success btn-sm"
                                    wire:click="buscarResponsabledatospersonal">Buscar Responsable</button>
                                </div>
                            </div>
                            {{-- datos personales del responsable del comando --}}
                            <div class="mb-3">
                                <label for="">Nombre</label>
                                <input style="text-transform:uppercase" type="text" wire:model="name"
                                id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Apellido Paterno</label>
                                <input style="text-transform:uppercase" type="text" 
                                wire:model="apellido_paterno" id="apellido_paterno" 
                                class="form-control @error('apellido_paterno') is-invalid @enderror" 
                                placeholder="Apellido Paterno">
                            </div>
                            <div class="mb-3">
                                <label for="">Apellido Materno</label>
                                <input style="text-transform:uppercase" type="text" wire:model="apellido_materno"
                                id="apellido_materno" class="form-control 
                                @error('apellido_materno') is-invalid @enderror" placeholder="Apellido Materno">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 

