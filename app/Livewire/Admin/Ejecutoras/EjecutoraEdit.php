<?php

namespace App\Livewire\Admin\Ejecutoras;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;

class EjecutoraEdit extends Component
{
    public $ejecutora;

    public $nameejecutora;
    public $nivel_coordinador='';
    public $dni;
    //user los datos que se busco
    public $name;
    public $apellido_paterno;
    public $apellido_materno;
    public $user_id;
    public $original_user_id; // Para almacenar el user_id original



    public function mount(Ejecutora $ejecutora){
        $this->nameejecutora=$ejecutora->name;
        $this->nivel_coordinador=$ejecutora->nivel;
        $this->dni=$ejecutora->DNI;
        //guradar el original
        $this->original_user_id = $ejecutora->user_id;
    }

    //buscar al responsable para actualizar
    public function buscarResponsableejecre(){
        //validar que el DNI no esté vacío
        $this->validate([
            'dni'=> 'required|digits:8',
            'nivel_coordinador'=>'required',
            'nameejecutora'=>'required',
        ]);

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
    }

    
    //actualizar  datos
    public function update(){
        $validatedData = $this->validate([
            'dni'=> 'required|digits:8',
            'nivel_coordinador'=>'required',
            'nameejecutora'=>'required',
            'user_id'=>'required',
        ],[
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener exactamente 8 dígitos.',
            'nivel_coordinador.required' => 'Debe seleccionar un nivel de coordinador.',
            'nameejecutora.required' => 'El nombre de la ejecutora es requerido.',
            'user_id.required'=>'Debe cargar el responsable',
        ]);

         // Validación si el user_id ya esta asignada a otra persona
            // if (Ejecutora::where('user_id', $this->user_id)->exists()) {
            //     $this->addError('user_id', 'Este usuario ya está asignado a otro comando.');
            //     return;
            // }

        // Si el user_id ha cambiado
        if($this->user_id != $this->original_user_id) {
            // Verificar si el nuevo user_id ya está asignado a otra ejecutora
            $existingEjecutora = Ejecutora::where('user_id', $this->user_id)
                                        ->where('id', '!=', $this->ejecutora->id)
                                        ->first();
            
            if($existingEjecutora) {
                $this->addError('user_id', 'Este usuario ya está asignado a otro comando.');
                return;
            }
        }
        

        //update user data
        $this->ejecutora->update([
            'name'=>$this->nameejecutora,
            'user_id'=>$this->user_id,
            'nivel'=>$this->nivel_coordinador,
            'DNI'=>$this->dni,
        ]);

        session()->flash('success', 'Datos actualizados correctamente');

        //si el nivel del usuario autentificado es desarro o nacional que pase a index
        //caso contrario que pase a vercomandos
        if (in_array(auth()->user()->ejecutora?->nivel, ['Desarrollador', 'Nacional'])) {
            return redirect()->route('admin.ejecutoras.index');
        } else {
            return redirect()->route('admin.ejecutoras.vercomando.index');
        }
        

    }

    public function render()
    {
        $ejecutoras=Ejecutora::all();
        return view('livewire.admin.ejecutoras.ejecutora-edit',compact('ejecutoras'));
    }
}
