@extends('tablar::page')
@section('title', 'datospersonals/create')
@section('content_header')
    <h1>Tus datos</h1>
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="row g-0">

          <div class="col-12 col-md-3 border-end">
            <div class="card-body">
              <h4 class="subheader">Datos Personal</h4>
              <div class="list-group list-group-transparent">
                <a href="{{ route('admin.capacitaciones.index') }}" class="list-group-item list-group-item-action d-flex align-items-center active">Capacitaciones</a>
                <a href="{{ route('admin.eventos.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Eventos</a>
                <a href="{{ route('admin.socialnetworks.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Redes del Partido</a>
                <a href="https://www.batallaperu.pe/" class="list-group-item list-group-item-action d-flex align-items-center">Pagina Web del Partido</a>
                {{-- <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Billing &amp; Invoices</a> --}}
              </div>
              {{-- <h4 class="subheader mt-4">Experience</h4>
              <div class="list-group list-group-transparent">
                <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
              </div> --}}
            </div>
          </div>
          <div class="col-12 col-md-9 d-flex flex-column">
            <div class="card-body">
              <h2 class="mb-4">Mi Registro</h2>
              <h3 class="card-title">Detalle de Perfil</h3>

              <div class="row align-items-center">
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

              <h3 class="card-title mt-4">Nombre del Militante/Sinpatizante</h3>
              <div class="row g-3">
                <div class="col-md">
                    <div class="form-label">DNI</div>
                    <input type="text" class="form-control" wire:model="users" value="{{ auth()->user()->DNI }}" readonly >
                </div>
                <div class="col-md">
                  <div class="form-label">Nombre</div>
                  <input type="text" class="form-control" wire:model="users" value="{{ auth()->user()->name }}" readonly >
                </div>
                <div class="col-md">
                  <div class="form-label">Apellido Paterno</div>
                  <input type="text" class="form-control" wire:model="users" value="{{ auth()->user()->apellido_paterno }}" readonly >
                </div>
                <div class="col-md">
                  <div class="form-label">Apellido Materno</div>
                  <input type="text" class="form-control" wire:model="users" value="{{ auth()->user()->apellido_materno }}" readonly >
                </div>
              </div>
              
                <h3 class="card-title mt-4">Redes Sociales</h3>
                <p class="card-subtitle">se muestra sus usuarios y correo electronico.</p>
              <div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-label">Correo</div>
                        <input type="text" class="form-control" wire:model="users" value="{{ auth()->user()->email }}" readonly >
                        </div>
                      <div class="col-md">
                        <div class="form-label">Name Facebook</div>
                        <input type="text" class="form-control" wire:model="datospersonal" value="{{ auth()->user()->datospersonals->facebook ?? '' }}" readonly >
                      </div>
                      <div class="col-md">
                        <div class="form-label">Name TikTok</div>
                        <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->tiktok ?? '' }}" readonly >
                      </div>
                      <div class="col-md">
                        <div class="form-label">Name Youtube</div>
                        <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->youtube ?? '' }}" readonly >
                      </div>
                      <div class="col-md">
                        <div class="form-label">Name x-twitter</div>
                        <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->x ?? '' }}" readonly >
                      </div>
                  {{-- <div class="col-auto">
                    <input type="text" class="form-control w-auto" value="paweluna@howstuffworks.com">
                  </div>
                  <div class="col-auto">
                    <a href="#" class="btn btn-1"> Change </a>
                  </div> --}}
                </div>
            {{-- comando  --}}
            </div>
                <h3 class="card-title mt-4">Comando</h3>
                <p class="card-subtitle">se muestra el nombre del comando al que pertenece.</p>
            <div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-label">Nombre del comando</div>
                        <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->ejecutora->name ?? '' }}" readonly >
                    </div>
                </div>
            </div>
            {{-- datos de domicilio --}}
              <h3 class="card-title mt-4">Domicilio</h3>
              <p class="card-subtitle">Datos del departamento - provincias - distrito donde vive.</p>
              <div class="row g-2">
                
                <div class="col-md">
                  <div class="form-label">Departamento</div>
                  <input type="text" id="departamento" class="form-control" value="{{ auth()->user()->datospersonals->departamento->name ?? '' }}" readonly >
                </div>
                <div class="col-md">
                  <div class="form-label">Provincia</div>
                  <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->provincia->name ?? '' }}" readonly >
                </div>
                <div class="col-md">
                  <div class="form-label">Distro</div>
                  <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->distrito->name ?? '' }}" readonly >
                </div>
                <div class="col-md">
                    <div class="form-label">Domicilio</div>
                    <input type="text" class="form-control" value="{{ auth()->user()->datospersonals->namedireccion ?? '' }}" readonly >
                </div>
            </div>
              {{-- <div>
                <a href="#" class="btn btn-1"> Set new password </a>
              </div> --}}
              <h3 class="card-title mt-4">Datos Correctos</h3>
              <p class="card-subtitle">si decea modificar estos datos, debe solicitarle a su coordinador de su comando.</p>
                


              <div>
                <label class="form-check form-switch form-switch-lg">
                  <input class="form-check-input" type="checkbox">
                  <span class="form-check-label form-check-label-on">Datos Correctos</span>
                  <span class="form-check-label form-check-label-off">Datos no correctos</span>
                </label>
              </div>
            </div>
            <div class="card-footer bg-transparent mt-auto">
              {{-- <div class="btn-list justify-content-end">
                <a href="#" class="btn btn-1"> Cancel </a>
                <a href="#" class="btn btn-primary btn-2"> Submit </a>
              </div> --}}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script></script>
@endsection