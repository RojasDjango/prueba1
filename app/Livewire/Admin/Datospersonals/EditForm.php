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

class EditForm extends Component
{
    public $datospersonal;
    // Para los selects escalonados
    public $departamentos;
    //user
    public $user;
    public $selectedUser;
    public $provincias;
    public $distritos;
    public $sectors;
    public $ejecutoras;
    
    public $selectedDepartamento;
    public $selectedProvincia;
    public $selectedDistrito;
    public $selectedSector;
    public $selectedEjecutoras;
    
    // Campos del formulario
    
    public $namedireccion;
    public $facebook;
    public $tiktok;
    public $youtube;
    public $x;
    public $kick;

    // Campos del formulario - User
    public $dniuser;
    public $nameuser;
    public $apellido_paternouser;
    public $apellido_maternouser;
    public $celular;
    public $email;
    //para capturar el DNI 
    public $ejecutora;
    public $idEjecutora;
    //para almacenar el user_id
    public $original_user_id;
    public $user_id;
    //cargar datos 
    public $name;
    public $apellido_paterno;
    public $apellido_materno;




    public function mount(Datospersonal $datospersonal)
    {
        // $ejecutoras = Ejecutora::where('DNI',$this->selectedEjecutoras);

        $this->datospersonal = $datospersonal;
        // Cargar datos existentes
        $this->selectedDepartamento = $datospersonal->departamento_id;
        $this->selectedProvincia = $datospersonal->provincia_id;
        $this->selectedDistrito = $datospersonal->distrito_id;
        $this->selectedSector = $datospersonal->sector_id;

        //se crea a ejecutora y se pasa el valor del user_id, y con ello pasas el modelo ejecutora
        $this->ejecutora = $datospersonal->ejecutora;
        //teniendo la fila en ejecutora buscas el DNI de ese id seleccionado y lo pasa a la vista
        // $this->selectedEjecutoras = $this->ejecutora->DNI;
        //capturar el id de ejecutora que pertenece al user_id


        // $this->idEjecutora = $ejecutoras->id;
        //esto es si se quiere directo en un selecct
        $this->selectedEjecutoras = $datospersonal->ejecutora->DNI;
        
        $this->namedireccion = $datospersonal->namedireccion;
        $this->facebook = $datospersonal->facebook;
        $this->tiktok = $datospersonal->tiktok;
        $this->youtube = $datospersonal->youtube;
        $this->x = $datospersonal->x;
        $this->kick = $datospersonal->kick;
        //captura guardar el id
        // $this->original_user_id = $this->ejecutora->user_id;
        
        // Cargar datos existentes de user
        $this->user = $datospersonal->user;
        $this->dniuser = $this->user->DNI;
        $this->nameuser = $this->user->name;
        $this->apellido_paternouser = $this->user->apellido_paterno;
        $this->apellido_maternouser = $this->user->apellido_materno;
        $this->celular = $this->user->celular;
        $this->email=$this->user->email;

        // Inicializar selects
        $this->departamentos = Departamento::all();
        $this->provincias = Provincia::where('departamento_id', $this->selectedDepartamento)->get();
        $this->distritos = Distrito::where('provincia_id', $this->selectedProvincia)->get();
        $this->sectors = Sector::all();
        $this->ejecutoras = Ejecutora::all();
        
    }
    
    public function updatedSelectedDepartamento($departamento_id)
    {
        // reiniciamo las variables relacionadas
        $this->reset(['selectedProvincia','selectedDistrito']);

        //para que se reinicie el select departaemnto
        $this->provincias = Provincia::where('departamento_id', $departamento_id)->get();
        // $this->selectedProvincia = null;//reinicia provincia
        // $this->selectedDistrito = null;//reinicia distrito
        $this->distritos = collect();//vacia los distrito

        $this->resetErrorBag(['selectedProvincia','selectedDistrito']);
    }
    
    public function updatedSelectedProvincia($provincia_id)
    {
        //reiniciamos el distrito
        $this->reset('selectedDistrito');
        
        $this->distritos = Distrito::where('provincia_id', $provincia_id)->get();
        $this->selectedDistrito = null;//reinica distrito

        //para que reinicie  los select dependientes
        //cuando cambia la provincia
        
    }
    
    

    //buscar al responsable para actualizar
    public function buscarResponsabledatospersonal(){
        //validar que el DNI no esté vacío
        $this->validate([
            'selectedEjecutoras'=> 'required|digits:8',
            
        ]);

        // este codigo captura el dato y con el $this->selectedEjecutoras busca en toda la tabla 
        //user, y si lo encuentra trae todo los valores de esa persona.
        $user = User::where('dni',$this->selectedEjecutoras)->first();

        if($user){
            $this->name = $user->name;
            $this->apellido_paterno = $user->apellido_paterno;
            $this->apellido_materno = $user->apellido_materno;
            
           
            //limpiar errores de validación si existían
            $this->resetErrorBag();
        }else{
            //caso contrario pasa a error
            $this->addError('selectedEjecutoras', 'La persona no esta registrada.');
            
            $this->reset(['name', 'apellido_paterno', 'apellido_materno']);
        }
    }


    public function update()
    {
        $validatedData = $this->validate([
            // User validation
            'dniuser' => 'required|string|max:8',
            'nameuser' => 'required|string|max:255',
            'apellido_paternouser' => 'required|string|max:255',
            'apellido_maternouser' => 'required|string|max:255',
            'celular' => 'required|string|max:9',
            'email'=>'required',
            //datospersonal validation
            'selectedDepartamento' => 'required|exists:departamentos,id',
            'selectedProvincia' => 'required|exists:provincias,id',
            'selectedDistrito' => 'required',
            'facebook' => 'required',
            'tiktok' => 'required',
            'youtube' => 'required',
            'x' => 'required',
            'kick' => 'required',
            'selectedSector' => 'required',
            'selectedEjecutoras' => 'required',
        ]);
        // para verificar que no este asignado en otra ejecutora
        //si el user_id ha cambiado
                // if($this->user_id != $this->original_user_id){
                //     //verificar si el nuevo user_id ya esta asignada a otra ejecutro
                //     $existeejecutora = Ejecutora::where('user_id',$this->user_id)
                //                         ->where('id','!=',$this->ejecutora->id)
                //                         ->first();
                //     if($existeejecutora){
                //         $this->addError('user_id','Este usuario ya está asignadao a otro comando');
                //         return;
                //     }
                // }
        //******fin */


        //*****inicio ******update user data
        $this->user->update([
            'DNI' => $this->dniuser,
            'name' => $this->nameuser,
            'apellido_paterno' => $this->apellido_paternouser,
            'apellido_materno' => $this->apellido_maternouser,
            'celular' => $this->celular,
            'email'=>$this->email,
        ]);

        $idEjecutora = Ejecutora::where('DNI',$this->selectedEjecutoras)->first();
        //update datospersonal data
        $this->datospersonal->update([
            'departamento_id' => $this->selectedDepartamento,
            'provincia_id' => $this->selectedProvincia,
            'distrito_id' => $this->selectedDistrito,
            'namedireccion' => $this->namedireccion,
            'facebook' => $this->facebook,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
            'x' => $this->x,
            'kick' => $this->kick,
            'sector_id' => $this->selectedSector,
            'ejecutora_id' => $idEjecutora->id,
            
        ]);
        
        

        session()->flash('success', 'Datos actualizados correctamente');
        
        if (in_array(auth()->user()->ejecutora?->nivel,['Desarrollador','Nacional'])) {
            return redirect()->route('admin.datospersonals.index');
        }elseif(in_array(auth()->user()->ejecutora?->nivel,['Regional'])){
            return redirect()->route('admin.datospersonals.departamento.index');
        }elseif(in_array(auth()->user()->ejecutora?->nivel,['Provincia'])){
            return redirect()->route('admin.datospersonals.provincia.index');
        }else{
            return redirect()->route('admin.datospersonals.distrito.index');
        }
    }

    public function render()
    {
        return view('livewire.admin.datospersonals.edit-form');
    }
}
