<?php

namespace App\Livewire\Admin\Datospersonals\Provincias;

use Livewire\Component;
use App\Models\Datospersonal;
use Livewire\WithPagination;
use App\Models\Departamento;
use App\Models\Provincia;

class ProvIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $perPage =10;//NUEMRO DE ELEMENTOS POR PAGINA
    public $customPerPage='';
    
    public $searchdepartamento='';//declara una propiedad publica que se sincroniza con el campo 
    //wire:model
    public $searchprovincia='';
    public $searchdistrito='';
    public $searchcomando='';
    public $sortField='id';//ordenar por  de forma predeterminada
    public $sortDirection = 'asc'; //ordenar en dirección descendente 
    //capturar el valor id
    public $userid ='';
    
    

    //
    

    // metodo para actualizar perpage
    public function updatePerPage(){
        //validar que sea un nuemro positivo
        if(is_numeric($this->customPerPage)&& $this->customPerPage>0){
            $this->perPage =(int)$this->customPerPage;
            $this->customPerPage='';//limpiar el input despues de establecer
            $this->resetPage();//volver a la primera pagina
        }
    }
    
    //resetear paginación cuando cambien los fitlros
    public function updated($propertyName){
        if(in_array($propertyName,['searchdepartamento',
        'searchprovincia','searchdistrito','searchcomando'])){
            $this->resetPage();//vuelva a la pagina 1
        }
    }

       //MÉTODO PARA CAMBIAR EL ORDEN
       public function sortBy($field){
        if($this->sortField === $field){
            //CAMBIAR LA DIRECCION DEL ORDEN SI YA ESA ORDENADO POR ESTE CAMPO
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc':'asc';
        } else{
            //SI ES UN NUEVO CAMPO, CAMBIAR LA COLUMNA DE ORDEN Y RESETEAR LA DIRECCION
            
            $this->sortDirection = 'asc';
            $this->sortField = $field;
        }
        $this->resetPage();//resetear a pagina 1 al cambiar orden
    }//********************fin de cambio de ordenamiento




    public function render()
    {
        $query = Datospersonal::query()//inicia una nueva consulta eloquent para el modelo Datospersonales
        ->join('departamentos', 'datospersonals.departamento_id', '=', 'departamento_id')//permite ordenar y filtrar por campos relacionados (solo require coincidencias en ambas tablas)
        ->leftJoin('provincias', 'datospersonals.provincia_id', '=', 'provincia_id')
        ->leftJoin('distritos','datospersonals.distrito_id','=','distrito_id')
        ->leftJoin('ejecutoras','datospersonals.ejecutora_id','=','ejecutora_id')//todos los re gistras de la tabla principal auqnue no tenga relación
        ->with(['departamento', 'provincia','distrito','ejecutora'])//precarga relación
        ->select('datospersonals.*');//selecciona solo columnas principales
        $query = Datospersonal::query()->with('departamento','provincia','distrito','ejecutora'); // Carga la relación eager loading

    // filtros
    // para filtar por departamentos,inicia con una nueva consulta (sin ejecutarla todavia)
    if(!empty($this->searchdepartamento)) {//solo aplica los filtros si hay texto en el campo busqueda
        $query->where(function($q) {//filtra los datos personal que tiene un departamento
            $q->whereHas('departamento', function($subQuery) {//permite filtrar basada entre modelos
                $subQuery->where('name', 'like', '%'.$this->searchdepartamento.'%');//es una subconsulta, y busca coincidencias
            })
            ->orWhere('departamento_id', 'like', '%'.$this->searchdepartamento.'%');//alternativa busca tambien diramente en el id del departamento
        });
    }

//********provincia */

    //inicio ***************con esto capturo el Id del usuario
    $userId = auth()->user()->id;
    //con ello busco en la tabla datospersonal del usuario autentificado
    $userData = Datospersonal::where('user_id',$userId)->first();
    //con ello buscto el nombre del departameto autentificado
    // $departamentoName = Departamento::find($userData->departamento_id)->name;
    
    //con ello inicializo al searchdepartamento  con el nombre del departaemtno autentificodo
    if ($userData && $userData->provincia_id) {
        $provincia = Provincia::find($userData->provincia_id);
        if ($provincia) {
            $this->searchprovincia = $provincia->name;
        }
    }
    //fin ***************************

    //provincia
    if(!empty($this->searchprovincia)) {//solo aplica los filtros si hay texto en el campo busqueda
        $query->where(function($q) {//filtra los datos personal que tiene un departamento
            $q->whereHas('provincia', function($subQuery) {//permite filtrar basada entre modelos
                $subQuery->where('name', 'like', '%'.$this->searchprovincia.'%');//es una subconsulta, y busca coincidencias
            })
            ->orWhere('provincia_id', 'like', '%'.$this->searchprovincia.'%');//alternativa busca tambien diramente en el id del departamento
        });
    }
//********************fin de provincia */


    //distrito
    if(!empty($this->searchdistrito)) {//solo aplica los filtros si hay texto en el campo busqueda
        $query->where(function($q) {//filtra los datos personal que tiene un departamento
            $q->whereHas('distrito', function($subQuery) {//permite filtrar basada entre modelos
                $subQuery->where('name', 'like', '%'.$this->searchdistrito.'%');//es una subconsulta, y busca coincidencias
            })
            ->orWhere('distrito_id', 'like', '%'.$this->searchdistrito.'%');//alternativa busca tambien diramente en el id del departamento
        });
    }
    //comando
    if(!empty($this->searchcomando)) {//solo aplica los filtros si hay texto en el campo busqueda
        $query->where(function($q) {//filtra los datos personal que tiene un departamento
            $q->whereHas('ejecutora', function($subQuery) {//permite filtrar basada entre modelos
                $subQuery->where('name', 'like', '%'.$this->searchcomando.'%');//es una subconsulta, y busca coincidencias
            })
            ->orWhere('ejecutora_id', 'like', '%'.$this->searchcomando.'%');//alternativa busca tambien diramente en el id del departamento
        });
    }//**********find e filtros********


    // Ordenación
    switch ($this->sortField) {
        case 'id':
            $query->orderBy('id', $this->sortDirection);
            break;
        case 'departamento_id':
            $query->orderBy('departamento_id', $this->sortDirection);
            break;
        case 'provincia_id':
            $query->orderBy('provincia_id', $this->sortDirection);
            break;
        case 'distrito_id':
            $query->orderBy('distrito_id', $this->sortDirection);
            break;
        case 'ejecutora_id':
            $query->orderBy('ejecutora_id', $this->sortDirection);
            break;
        default:
            $query->orderBy($this->sortField, $this->sortDirection);
    }
        // $datospersonals =$query->paginate($this->perPage);




    //where() agrupa las coincidencias con parentesis en la consulta SQL, sine sto los orwhere podrian afectar a otros filtros
    // $datopersonals = $query->get();
    //ejecuta la consulta construida y obtiene los resultados
    //wire:model.live sincroniza el input actualiza los resultados en tiempo real sin necsidad de enviar el formulario
    //wire:model.debounce.500ms espera 500ms despues de dejar de escribir
    //wire:model.lazy actualiza solo l salir del campo

    $datopersonals = $query->paginate($this->perPage);
    


        return view('livewire.admin.datospersonals.provincias.prov-index',compact('datopersonals'));
    }
}
