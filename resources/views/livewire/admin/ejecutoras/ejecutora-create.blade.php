<div class="container container-tight py-4">
    <div class="text-center mb-1 mt-5">
        <a href="" class="navbar-brand navbar-brand-autodark">
            <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                alt=""></a>
    </div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">CREAR A UN COORDINADOR / COMANDO NUEVO</h2>
                <!-- Mostrar mensajes flash -->
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

            <form  wire:submit.prevent="save" method="post" autocomplete="off">
                @csrf
                {{-- nombre del comando --}}
                <div class="mb-3">
                    <div class="form">
                        <button type="submit" class="btn btn-primary w-100">
                            <span wire:loading.remove>Guardar Comando</span>
                            <span wire:loading>Guardando...</span>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nombre_comando" class="form-label">Nombre del comando</label>
                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="nombre_comando"
                    id="nombre_comando" name="nombre_comando" placeholder="Nombre del Comando" >
                    @error('nombre_comando')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- opción de cargado para seleccionar el nivel  --}}
                <label class="form-label">Nivel del Coordinador</label>
                <div class="form-selectgroup-boxes row mb-3">
                    {{-- //para que solo lo pueda ver el desarrollador --}}
                    @if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador']))
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input wire:model="nivel_coordinador" type="radio" name="nivel_coordinador" value="Provincia" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">CEN</span>
                                    <span class="d-block text-muted">La persona es miembro del CEN</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    @else
                        
                    @endif

                    {{-- //para que solo lo pueda ver el CEN --}}
                    @if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador','Nacional']))
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input wire:model="nivel_coordinador" type="radio" name="nivel_coordinador" value="Departamento" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Regional</span>
                                    <span class="d-block text-muted">La persona es Coordinardor de su Region</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    @else
                        
                    @endif
                    {{-- //fin de niveles especiales  --}}
                    @if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador','Nacional','Regional']))
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input wire:model="nivel_coordinador" type="radio" name="nivel_coordinador" value="Provincia" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Provincia</span>
                                        <span class="d-block text-muted">La persona será resonsable de la Provincia</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    @else
                        
                    @endif
                    {{-- fin de provincia --}}
                    @if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador','Nacional','Regional','Provincia']))
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input wire:model="nivel_coordinador" type="radio" name="nivel_coordinador" value="Distrito" class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Distrital</span>
                                        <span class="d-block text-muted">Será responsable de su Distrito</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    @else
                        
                    @endif
                    {{-- fin de distrito --}}
                    @if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador','Nacional','Regional','Provincia','Distrital']))
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" wire:model="nivel_coordinador" name="nivel_coordinador" 
                                value="Comando" class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Comando</span>
                                        <span class="d-block text-muted">Será responsable de su Comando</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    @else
                        
                    @endif
                    
                </div>

                {{-- DNI --}}
                <div class="row">
                    {{-- <div class=" col-lg-6"> --}}
                        <div class="mb-3">
                            <label for="dni" class="form-label">Ingrese DNI del Responsable</label>
                            <input style="text-transform:uppercase" name="dni" type="text" 
                            class="form-control @error('dni') is-invalid @enderror" 
                            placeholder="Ingresar DNI"  wire:model="dni">
                            @error('dni')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            </form>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Buscar </label>
                            <button class="btn btn-success btn-sm"
                            wire:click="buscarResponsable">Buscar Responsable</button>
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
                    <div class="mb-3">
                        <label for="">Código</label>
                        <input style="text-transform:uppercase" type="text" wire:model="user_id"
                        id="user1" class="form-control">
                        
                    </div>
                    

                <!-- Mostrar mensajes flash -->

                
        </div>
        {{-- <div class="hr-text">or</div>
        <div class="card-body">
            <div class="row">
                <div class="col"><a href="#" class="btn btn-white w-100">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path
                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                        </svg>
                        Login with Github
                    </a></div>
                <div class="col"><a href="#" class="btn btn-white w-100">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path
                                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"/>
                        </svg>
                        Login with Twitter
                    </a></div>
            </div>
        </div> --}}
    </div>
    
</div>
