@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')

<div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36" alt="">
            </a>
        </div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Registro de Militantes</h2>
            <form  action="{{route('register')}}" method="post" autocomplete="off" novalidate>
            @csrf
            {{-- DNI --}}
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" name="DNI" class="form-control @error('DNI') is-invalid @enderror" placeholder="Ingrese DNI">
                @error('DNI')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- nombre --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input wire:model="selectedSector" style="text-transform:uppercase" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ingrese Nombre">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Apellido Paterno --}}
            <div class="mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input wire:model="selectedSector" style="text-transform:uppercase"  type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" placeholder="Ingrese Nombre">
                @error('apellido_paterno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Apellido Materno --}}
            <div class="mb-3">
                <label class="form-label">Apellido Materno</label>
                <input wire:model="selectedSector" style="text-transform:uppercase" type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" placeholder="Ingrese Nombre">
                @error('apellido_materno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- correo --}}
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            {{-- celular --}}
            <div class="mb-3">
                <label class="form-label">N° Celular</label>
                <input type="text" name="celular" class="form-control " placeholder="Enter celular">
                @error('celular')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- //clave y confirmación de clave --}}
                <div class="mb-3">
                    <label class="form-label">Clave</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                </svg>
                            </a>
                        </span>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar clave</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2"/>
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                </svg>
                            </a>
                        </span>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    {{-- politicas con check --}}
                    {{-- <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        
                        <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
                    </label> --}}

                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Crear mi Cuenta</button>
                </div>
            </form> 
            <div class="hr-text">or</div>  
            <h4>Solo puedes tener una cuenta !!</h4>
        </div>    
    </div>
            <div class="text-center text-muted mt-3">
                Ya tengo Cuenta? <a href="{{route('login')}}" tabindex="-1">Regresar a Login</a>
            </div>
        
</div>

@endsection
