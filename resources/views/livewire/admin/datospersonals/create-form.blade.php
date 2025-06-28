<div class="container container-tight py-4">
    <div class="card card-md">
        <div class="card-body">
            <form wire:submit.prevent="save">
                @csrf
                {{-- <input method="post" name="user_id" type="hidden"  > --}}
                {{-- select de departamento --}}
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <select wire:model.live="selectedDepartamento" name="selectedDepartamento" id="departamento" class="form-control @error('selectedDepartamento') is-invalid @enderror">
                        <option value="" class="form-control" >Departamento donde vive</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" >{{ $departamento->name }}</option>
                        @endforeach
                    </select>
                        
                        @error('selectedDepartamento')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- select provincias --}}
                <div class="mb-3">
                    <label for="selectedProvincia" class="form-label">Provincia</label>
                    <select wire:model.live="selectedProvincia" name="selectedProvincia"  id="selectedProvincia" class="form-control @error('pselectedProvincia') is-invalid @enderror"
                    @if (!$selectedDepartamento) disabled @endif>
                        <option value="" >Provincia donde vive</option>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}" >{{ $provincia->name }}</option>
                        @endforeach
                    </select>
                        @error('selectedProvincia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- select distrito --}}
                <div class="mb-3">
                    <label for="selectedDistrito" class="form-label">Distrito</label>
                    <select wire:model="selectedDistrito" name="selectedDistrito"  id="selectedDistrito" class="form-control @error('selectedDistrito') is-invalid @enderror"
                    @if (!$selectedProvincia) disabled @endif>
                        <option value="" >Distrito donde vive</option>
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->id }}" >{{ $distrito->name }}</option>
                        @endforeach
                    </select>
                        @error('selectedDistrito')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- campo de distrito
                <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input style="text-transform:uppercase" type="text" wire:model="distrito" id="distrito" class="form-control @error('distrito') is-invalid @enderror" placeholder="Distrito donde vive">
                    @error('distrito')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                {{-- campo de name direccion --}}
                <div class="mb-3">
                    <label for="namedireccion" class="form-label">Direccion</label>
                    <input style="text-transform:uppercase" type="text" wire:model="namedireccion" id="namedireccion" class="form-control @error('namedireccion') is-invalid @enderror" placeholder="dirección donde vive completo">
                    @error('namedireccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- campo de name facebook --}}
                <div class="mb-3">
                    <label for="facebook" class="form-label">Name Facebook</label>
                    <input  type="text"  id="facebook" wire:model="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Con que nombre estas en facebook">
                    @error('facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- campo de name tiktok --}}
                <div class="mb-3">
                    <label for="tiktok" class="form-label">Name tiktok</label>
                    <input style="text" type="text"  wire:model="tiktok" id="tiktok" class="form-control @error('tiktok') is-invalid @enderror" placeholder="Con que nombre estas en tiktok">
                    @error('tiktok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- campo de name yotube --}}
                <div class="mb-3">
                    <label for="youtube" class="form-label">Name youtube</label>
                    <input style="text" type="text" wire:model="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="Con que nombre estas en youtube">
                    @error('youtube')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- campo de name x --}}
                <div class="mb-3">
                    <label for="x" class="form-label">Name x</label>
                    <input style="text" type="text" wire:model="x" id="x" class="form-control @error('x') is-invalid @enderror" placeholder="Con que nombre estas en x">
                    @error('x')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- campo de name kick --}}
                <div class="mb-3">
                    <label for="kick" class="form-label">Name kick</label>
                    <input style="tex" type="kick"  id="kick" wire:model="kick" class="form-control @error('kick') is-invalid @enderror" placeholder="Con que nombre estas en kick">
                    @error('kick')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- select sector --}}
                <div class="mb-4">
                    <label for="sectores" class="form-label">Sector donde labor</label>
                    <select wire:model="selectedSector" name="selectedSector" id="selectedSector" class="form-control @error('selectedSector') is-invalid @enderror">
                        <option value="">¿En que sector, Labora usted?</option>
                        @foreach ($sectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                        
                        @error('selectedSector')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- select ejecutoras --}}

                {{-- <div class="mb-4">
                    <label for="selectedEjecutoras" class="form-label">Nombre del comando</label>
                    <select wire:model="selectedEjecutoras" name="selectedEjecutoras" id="selectedEjecutoras" class="form-control @error('selectedEjecutoras') is-invalid @enderror">
                        <option value="">¿A que comando perteneces?</option>
                        @foreach ($ejecutoras as $ejecutora)
                            <option value="{{ $ejecutora->id }}">{{ $ejecutora->name }}</option>
                        @endforeach
                    </select>
                        
                        @error('selectedEjecutoras')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div> --}}

                {{-- ........ --}}

                <div class="mb-3">
                    <label for="dni" class="form-label">Ingrese DNI del Responsable</label>
                    <input style="text-transform:uppercase" name="dni" type="text" 
                    class="form-control @error('dni') is-invalid @enderror" 
                    placeholder="Ingresar DNI"  wire:model="dni" wire:blur="buscarResponsableDatospersonal">
                    @error('dni')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
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
                    placeholder="Apellido Paterno" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Apellido Materno</label>
                    <input style="text-transform:uppercase" type="text" wire:model="apellido_materno"
                    id="apellido_materno" class="form-control 
                    @error('apellido_materno') is-invalid @enderror" placeholder="Apellido Materno" readonly>
                </div>
                
                

            <!-- Mostrar mensajes flash -->






                {{-- boton de submit --}}
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Crear mi Cuenta</button>
                </div>
            </form>
            <div class="hr-text">or</div> 
            <div class="text-center text-muted mt-3">
                Estimado simpatizante y militante completar la 
                información de sus datos. 
            </div>
        </div>
    </div>
</div>



