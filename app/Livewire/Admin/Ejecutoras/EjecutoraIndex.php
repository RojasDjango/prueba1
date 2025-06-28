<?php

namespace App\Livewire\Admin\Ejecutoras;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EjecutoraIndex extends Component
{   
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    //datos de user
    
    
    public $searchcomando='';
    public $searchejecunivel='';
    public $name;
    public $dni;
    public $apellido_paterno;
    public $apellido_materno;
    public $user_id;
    //paginación
    public $perPage =10;
    public $customPerPage='';
    //ordenar
    public $sortField='id';//ordenar por  de forma predeterminada
    public $sortDirection = 'asc'; //ordenar en dirección descendente
    
    
    // metodo para actualizar perpage
    public function updatePerPageEjecutora(){
        //validar que sea un nuemro positivo
        if(is_numeric($this->customPerPage)&& $this->customPerPage>0){
            $this->perPage =(int)$this->customPerPage;
            $this->customPerPage='';//limpiar el input despues de establecer
            $this->resetPage();//volver a la primera pagina
        }
    }
    
    //resetear paginación cuando cambien los fitlros
    public function updated($propertyName){
        if(in_array($propertyName,['searchcomando'])){
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
        //para filtrar por comandos
        $query = Ejecutora::query()->with('user')
                ->when($this->searchcomando,function($query){
                    $query->where('name','like','%'.$this->searchcomando.'%');
                });
        //para filtrar por nivel
        $query = Ejecutora::query()
                ->when($this->searchejecunivel,function($query){
                    $query->where('nivel','like','%'.$this->searchejecunivel.'%');
                });
        
       // Ordenación
        switch ($this->sortField) {
        case 'id':
            $query->orderBy('id', $this->sortDirection);
            break;
        case 'name':
            $query->orderBy('name', $this->sortDirection);
            break;
        
        default:
            $query->orderBy($this->sortField, $this->sortDirection);
        }



        $ejecutoras =$query->paginate($this->perPage);

        
        
        return view('livewire.admin.ejecutoras.ejecutora-index',compact('ejecutoras'));
    }


 
}
