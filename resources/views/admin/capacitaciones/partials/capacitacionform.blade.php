<div class="modal modal-blur fade" id="modal-capacitacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{-- {!! Form::open(['route'=>'admin.capacitaciones.store','method'=>'POST']) !!} --}}
            <form action="{{ route('admin.capacitaciones.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Capacitación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- //ingresar tema --}}
                    <div class="mb-3">
                        <label class="form-label">Tema</label>
                        <input type="text" class="form-control" name="tema"
                        value="{{ old('tema') }}" placeholder="Nombre de la Capacitación"
                        required>
                    </div>
                    {{-- alcance --}}
                    <label class="form-label">Alcance</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="alcance" value="Especifico" class="form-selectgroup-input" 
                                {{ old('alcance', 'especifico') == 'especifico' ? 'checked' : '' }} checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Especifico</span>
                                        <span class="d-block text-muted">Dictado para una determinada zona</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="alcance" value="Público"
                                class="form-selectgroup-input" {{ old('alcance') == 'publico' ? 'checked' : '' }}>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Público</span>
                                        <span class="d-block text-muted">Capacitaciones para todos los militantes y simpatizantes</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Enlace url</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" name="enlace" class="form-control ps-0"  
                                    value="{{ old('enlace') }}" autocomplete="off" placeholder="https://youtube.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de Capacitación</label>
                                    <div class="input-group input-group-flat">
                                        <input type="date" name="fecha" class="form-control"
                                        value="{{ old('fecha') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descripción</label>
                                    <input type="text" class="form-control" name="descripción"
                                    value="{{ old('descripción') }}" placeholder="Comentar"
                                    required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear Capacitación
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
