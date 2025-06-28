<?php

namespace App\Livewire\Admin\Ejecutoras;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EjecutoraCreate extends Component
{
    use WithPagination;

    //user
    public $dni;
    public $name;
    public $apellido_paterno;
    public $apellido_materno;
    public $user_id;
    public $user1;
    public $nombre_comando;
    public $nivel_coordinador='coordinador';//valor por defecto para provincia

    //mensaje de validación personalizada
    

    public function buscarResponsable(){
        // Validar que el DNI no esté vacío
        $this->validate([
            'dni' => 'required|digits:8',
            'nivel_coordinador'=>'required',
            'nombre_comando'=>'required',
            // 'user_id'=>'required|user:unique',
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

    //guardar
    public function save()
    {
       
       // Validación básica primero
    $this->validate([
        'dni' => 'required|digits:8',
        'nivel_coordinador' => 'required',
        'nombre_comando' => 'required',
        'user_id' => 'required'
    ]);

    // Validación si el user_id ya esta asignada a otra persona
    if (Ejecutora::where('user_id', $this->user_id)->exists()) {
        $this->addError('user_id', 'Este usuario ya está asignado a otro comando.');
        return;
    }
       
        // Crear la nueva ejecutora
        Ejecutora::create([
            'DNI'=> $this->dni,
            'name' => $this->nombre_comando,
            'nivel' => $this->nivel_coordinador,
            'user_id' => $this->user_id,
        ]);

        // Resetear el formulario
        $this->reset([
            'dni', 'name', 'apellido_paterno', 'apellido_materno', 'user_id',
            'nombre_comando'
        ]);

        // Mostrar mensaje de éxito
        session()->flash('success', 'Comando guardado exitosamente.');

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
        // $ejecutoras = Ejecutora::with('user')->paginate(10);
        $ejecutoras=Ejecutora::all();
        return view('livewire.admin.ejecutoras.ejecutora-create',compact('ejecutoras'));
    }
}
