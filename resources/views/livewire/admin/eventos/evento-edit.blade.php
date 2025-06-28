<div class="container container-tight py-4">
    <div class="text-center mb-1 mt-5">
        <a href="" class="navbar-brand navbar-brand-autodark">
            <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                alt=""></a>
    </div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">EDITAR EVENTO DE CAMPAÑA</h2>
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
            <form wire:submit.prevent="update" >
                @csrf
                {{-- nombre del comando --}}
                <div class="mb-3">
                    <div class="form">
                        <button type="submit" class="btn btn-primary w-100">
                            <span wire:loading.remove>Guardar Evento</span>
                            <span wire:loading>Guardando...</span>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nombre_evento" class="form-label">Nombre del Evento</label>
                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="nombre_evento"
                    id="nombre_evento" name="nombre_evento" placeholder="Nombre del Evento" >
                    @error('nombre_evento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- fecha --}}
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" wire:model="fecha"
                    placeholder="colocar fecha">
                </div>
                {{-- option de evento  --}}
                {{-- codigo de evento --}}
                <div class="mb-3">
                    <label class="form-label">Codigo Evento</label>
                    <select class="form-select" wire:model="CodigoEvento" name="CodigoEvento" id="CodigoEvento">
                        <option value="evento_1">evento_1</option>
                        <option value="evento_2">evento_2</option>
                        <option value="evento_3">evento_3</option>
                        <option value="evento_4">evento_4</option>
                        <option value="evento_5">evento_5</option>
                    </select>
                </div>
                {{-- select departamento --}}
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <select wire:model.live="SelectDepartamentoEvento" name="SelectDepartamentoEvento" id="SelectDepartamentoEvento" class="form-control @error('SelectDepartamentoEvento') is-invalid @enderror">
                        <option value="" class="form-control" >Departamento del Evento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" >{{ $departamento->name }}</option>
                        @endforeach
                    </select>
                        
                        @error('SelectDepartamentoEvento')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- select provincias --}}
                <div class="mb-3">
                    <label for="selectedProvinciaEvento" class="form-label">Provincia</label>
                    <select wire:model.live="selectedProvinciaEvento" name="selectedProvinciaEvento"  id="selectedProvinciaEvento" class="form-control @error('pselectedProvinciaEvento') is-invalid @enderror"
                    @if (!$SelectDepartamentoEvento) disabled @endif>
                        <option value="" >Provincia del Evento</option>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }}" >{{ $provincia->name }}</option>
                        @endforeach
                    </select>
                        @error('selectedProvinciaEvento')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                {{-- detalles --}}
                <div class="mb-3">
                    <label for="detalle" class="form-label">Detalle</label>
                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="detalle"
                    id="detalle" name="detalle" placeholder="Nombre del Evento" >
                    @error('detalle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>

