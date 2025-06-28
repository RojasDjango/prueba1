@extends('tablar::page')
@section('title', 'Roles/Edit')
@section('content_header')
    <h1></h1>
@endsection
@section('content')
    @if (session('info'))
        <div class="aler alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
  
        
    @endif

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <p class="h5">Nombre</p>
                            <p class="form-control">{{ $user->name }}</p>
                            <p class="form-control">{{ $user->apellido_paterno }}</p>
                            <p class="form-control">{{ $user->apellido_materno }}</p>

                            <h2 class="h5">Lista de Roles</h2>
                            
                            {!! Form::model($user, ['route'=>['admin.users.update',$user],'method'=>'put']) !!}

                            {{-- //las dos forma funciona para buscar si el usuario autentificado esta en ejecutora y que nivel tiene --}}
                                {{-- @if (auth()->user()->ejecutora  && auth()->user()->ejecutora->nivel == 'Nacional' ) --}}
                                @if(auth()->user()->ejecutora?->nivel == "Desarrollador")
                                    @foreach ($roles as $role)
                                    <div>
                                        <label for="">
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                @elseif(auth()->user()->ejecutora?->nivel == "Nacional")
                                    <div>
                                        {!! Form::checkbox('roles[]', '2', null, ['class'=>'mr-1']) !!}
                                        CEN
                                    </div>
                                    <div>
                                        {!! Form::checkbox('roles[]', '3', null, ['class'=>'mr-1']) !!}
                                        Candidatos
                                    </div>
                                    <div>
                                        {!! Form::checkbox('roles[]', '4', null, ['class'=>'mr-1']) !!}
                                        Coordinador_Regiones
                                    </div>
                                @elseif(auth()->user()->ejecutora?->nivel == "Regional")
                                    <div>
                                        {!! Form::checkbox('roles[]', '3', null, ['class'=>'mr-1']) !!}
                                        Candidatos
                                    </div>
                                    <div>
                                        {!! Form::checkbox('roles[]', '5', null, ['class'=>'mr-1']) !!}
                                        Coordinador_Provincias
                                    </div>
                                @elseif(auth()->user()->ejecutora?->nivel == "Provincia")
                                    <div>
                                        {!! Form::checkbox('roles[]', '6', null, ['class'=>'mr-1']) !!}
                                        Coordinador_Distritales
                                    </div>
                                @elseif(auth()->user()->ejecutora?->nivel == "Distrital")
                                    <div>
                                        {!! Form::checkbox('roles[]', '7', null, ['class'=>'mr-1']) !!}
                                        Coordinador_Comando
                                    </div>
                                @endif
                                    

                                {{-- @foreach ($roles as $role)
                                    <div>
                                        <label for="">
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach --}}

                                {!! Form::submit('Asignar Rol', ['class'=>'btn btn-primary mt-2']) !!}
                            {!! Form::close() !!}
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