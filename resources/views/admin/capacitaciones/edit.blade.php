@extends('tablar::page')
@section('title', 'capacitacion/edit')
@section('content_header')
@endsection
@section('content')
    
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                    alt=""></a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Actualizar Capacitaciones </h2>
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

                {!! Form::model($capacitacione, ['route'=>['admin.capacitaciones.update',$capacitacione],'method'=>'put']) !!}
                    <div class="form-group{{ $errors->has('tema') ? ' has-error' : '' }}">
                    {!! Form::label('tema', 'Tema',['class'=>'form-label']) !!}
                    {!! Form::text('tema', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('tema') }}</small>
                    </div>
                    {{-- seleccion de publico y especifico --}}
                    <label class="form-label">Participación</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="radio{{ $errors->has('alcance') ? ' has-error' : '' }}">
                                            <label for="alcance" >
                                                <span class="me-3">
                                                    {!! Form::radio('alcance', 'Público',  $capacitacione->alcance == 'Público', ['id' => 'radio_id','class'=>'form-selectgroup-check']) !!} 
                                                </span>
                                                <span class="form-selectgroup-label-content">
                                                    <span class="form-selectgroup-title strong mb-1">Público</span>
                                                    <span class="d-block text-muted">La capacitación es para todos los militantes</span>
                                                </span>
                                            </label>
                                            <small class="text-danger">{{ $errors->first('alcance') }}</small>
                                        </div>   
                                    </span>
                                
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="radio{{ $errors->has('alcance') ? ' has-error' : '' }}">
                                            <label for="alcance" >
                                                <span class="me-3">
                                                    {!! Form::radio('alcance', 'Especifico',  $capacitacione->alcance == 'Especifico', ['id' => 'radio_id','class'=>'form-selectgroup-check']) !!} 
                                                </span>
                                                <span class="form-selectgroup-label-content">
                                                    <span class="form-selectgroup-title strong mb-1">Específico</span>
                                                    <span class="d-block text-muted">La capacitación es para todos los militantes</span>
                                                </span>
                                            </label>
                                            <small class="text-danger">{{ $errors->first('alcance') }}</small>
                                        </div>   
                                    </span>
                                
                            </label>
                        </div>
                        {{-- <div class="radio{{ $errors->has('alcance') ? ' has-error' : '' }}">
                        <label for="alcance">
                        {!! Form::radio('alcance', 'Especifico',  $capacitacione->alcance == 'Especifico', ['id' => 'radio_id']) !!} Específico
                        </label>
                        <small class="text-danger">{{ $errors->first('alcance') }}</small>
                        </div> --}}

                    </div>
                    {{-- <div class="form-group{{ $errors->has('alcance') ? ' has-error' : '' }}">
                    {!! Form::label('alcance', 'Alcance',['class'=>'form-label']) !!}
                    {!! Form::text('alcance', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('alcance') }}</small>
                    </div> --}}

                    <div class="form-group{{ $errors->has('enlace') ? ' has-error' : '' }}">
                    {!! Form::label('enlace', 'Enlace',['class'=>'form-label']) !!}
                    {!! Form::text('enlace', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('enlace') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                    {!! Form::label('fecha', 'Fecha',['class'=>'form-label']) !!}
                    {!! Form::date('fecha', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('fecha') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('descripción') ? ' has-error' : '' }}">
                    {!! Form::label('descripción', 'Descripción',['class'=>'form-label']) !!}
                    {!! Form::text('descripción', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('descripción') }}</small>
                    </div>

                    <div class="form-footer">
                        <div class="mb-2">
                        {!! Form::submit('Modificar Capacitación', ['class'=>'btn btn-primary w-100']) !!}
                        </div>
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    
@endsection