<?php

namespace App\Livewire\Admin\Eventos;

use App\Models\Departamento;
use App\Models\Evento;
use App\Models\Provincia;
use Livewire\Component;

class EventoCreate extends Component
{
    //departamento
    public $departamentos;
    public $SelectDepartamentoEvento=null;
    //provincia
    public $provincias;
    public $selectedProvinciaEvento=null;
    //
    public $nombre_evento;
    public $detalle;
    public $fecha;
    //codigo del evento
    public $CodigoEvento='evento_1';


    public function mount(){
        $this->departamentos = Departamento::all();
        $this->provincias=collect([]);
    }

    //cada vez que se actualice buscara el ID de departamento
    public function updatedSelectDepartamentoEvento($departamento_id){
        $this->provincias=Provincia::where('departamento_id',$departamento_id)->get();
        $this->selectedProvinciaEvento=null;
    }
    
    //guardar los datos
    public function save(){
        $validatedData = $this->validate([
            'SelectDepartamentoEvento'=>'required|exists:departamentos,id',
            'selectedProvinciaEvento'=>'required|exists:provincias,id',
            'nombre_evento'=>'required',
            'detalle'=>'required',
            'fecha'=>'required',
            'CodigoEvento'=>'required',

        ]);
        Evento::create([
            'name'=>$this->nombre_evento,
            'fecha'=>$this->fecha,
            'detalle'=>$this->detalle,
            'departamento_id'=>$this->SelectDepartamentoEvento,
            'provincia_id'=>$this->selectedProvinciaEvento,
            'codigo_evento'=>$this->CodigoEvento,
        ]);
        return redirect()->route('admin.eventos.index');
    }
    
    public function render()
    {
        

        return view('livewire.admin.eventos.evento-create');
    }
}
