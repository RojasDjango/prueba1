<?php

namespace App\Livewire\Admin\Datospersonals;

use App\Models\Datospersonal;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Ejecutora;
use App\Models\Provincia;
use App\Models\Sector;
use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CreateForm extends Component
{
    //para generar las select escalonados
    public $departamentos;
    
    public $provincias;
    public $distritos;// distrito 1
    public $sectors;
    public $distrito;
    public $namedireccion;
    public $facebook;
    public $tiktok;
    public $youtube;
    public $x;
    public $kick;
    public $ejecutoras;
    public $selectedDepartamento = null;
    public $selectedProvincia = null;
    public $selectedSector = null;
    public $selectedEjecutoras=null;
    public $selectedDistrito=null;//distrito 4
    public $datospersonal='users';
    //datos de ejecutora 
    public $dni;
    public $ejecutora;
    public $dniejecutora;
    //datos de user
    public $user_id;
    public $name;
    public $apellido_paterno;
    public $apellido_materno;

    //livewire de buscar DNI en la ejecutora y en el user
    public function buscarResponsableDatospersonal(){
        // Validar que el DNI no esté vacío
        $this->validate([
            'dni' => 'required|digits:8',
            
            // 'user_id'=>'required|user:unique',
        ]);
        

        $ejecutora = Ejecutora::where('dni',$this->dni)->first();
        if ($ejecutora) {
                // este codigo captura el dato y con el $this->dni busca en toda la tabla 
                //user, y si lo encuentra trae todo los valores de esa persona.
                $user = User::where('dni',$this->dni)->first();

                if($user){
                    $this->name = $user->name;
                    $this->apellido_paterno = $user->apellido_paterno;
                    $this->apellido_materno = $user->apellido_materno;
                    $this->user_id = $user->id;
                    //limpiar errores de validación si existían
                    $this->resetErrorBag();
                }else{
                //caso contrario pasa a error
                    $this->addError('dni', 'La persona no esta registrada.');
                    
                    $this->reset(['name', 'apellido_paterno', 'apellido_materno']);
                }

        } else {
            //caso contrario pasa a error
            $this->addError('dni', 'El comando no esta registrado.');
                    
            $this->reset(['dni','name', 'apellido_paterno', 'apellido_materno']);
        }
        
    }
    //*****fin  */
    


    //inilicializa las variables de select escalondas
    public function mount(){
        
       
        //verificar si el usuriao ya tiene datos registrados
        if(Datospersonal::where('user_id',Auth::id())->exists()){
            session()->flash('error','ya has registrado tus datos personales anteriormente');
        return redirect()->route('admin.datospersonals.index');
        }
        //fin .............verificar si el usuriao ya tiene datos registrados
        
        $this->sectors=Sector::all();
        $this->ejecutoras=Ejecutora::all();
        $this->departamentos = Departamento::all();
        $this->provincias=collect([]);//inicializa como coleccion vacia
        $this->distritos=collect([]);//distrito 2 inicializa como coleccion vacia
    }
    
    //cada vez que se actualice buscara el Id de departamento
    public function updatedSelectedDepartamento($departamento_id){
        $this->provincias= Provincia::where('departamento_id',$departamento_id)->get();//ciclo de vida del componente
        $this->selectedProvincia = null;
        $this->selectedSector = null;
        $this->selectedEjecutoras =null;
        
    }
    //distrito 3 cada vez que se actualice buscara el Id de provincia
    public function updatedSelectedProvincia($provincia_id){
        $this->distritos= Distrito::where('provincia_id',$provincia_id)->get();//ciclo de vida del componente
        $this->selectedDistrito = null;
        
    }
    
    //user para el DNI
    
    //****fin de dni */
    public function save(){
        $validatedData = $this->validate([
            // 'user_id'=>'required',
            // 'datospersonal.user_id'=>'required|exists:users,id',
            'selectedDepartamento'=>'required|exists:departamentos,id',
            'selectedProvincia'=>'required|exists:provincias,id',
            'selectedDistrito'=>'required',//distrito 5
            
            'facebook'=>'required',
            'tiktok'=>'required',
            'youtube'=>'required',
            'x'=>'required',
            'kick'=>'required',
            'selectedSector'=>'required',
            // 'selectedEjecutoras'=>'required',
        ]);
    
        
        $userid = Auth::id();
        //solo para capturar el valor de id del DNI ingresado
        $ejecutora = Ejecutora::where('dni',$this->dni)->first();
        $this->dniejecutora = $ejecutora->id;
        //guardar directamente desde livewire
        Datospersonal::create([
            
        'user_id'=>Auth::id(),
        'provincia_id'=>$this->selectedProvincia,
        'departamento_id'=>$this->selectedDepartamento,
        // 'provincia_id'=>$this->selectedProvincia,
        'distrito_id'=>$this->selectedDistrito,//distrito 6
        
        'namedireccion'=>$this->namedireccion,
        'facebook'=>$this->facebook,
        'tiktok'=>$this->tiktok,
        'youtube'=>$this->youtube,
        'x'=>$this->x,
        'kick'=>$this->kick,
        'sector_id'=>$this->selectedSector,
        // 'ejecutora_id'=>$this->selectedEjecutoras
        'ejecutora_id'=>$this->dniejecutora,
        ]);


        $id=Auth::id();
        return redirect()->route('admin.socialnetworks.index')->with('success','datos guardados correctamente');
        
        
    }

    

    public function render()
    {
        
        return view('livewire.admin.datospersonals.create-form');
        
    }
}
