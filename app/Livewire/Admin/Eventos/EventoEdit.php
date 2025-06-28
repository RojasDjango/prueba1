<?php

namespace App\Livewire\Admin\Eventos;

use App\Models\Departamento;
use App\Models\Evento;
use App\Models\Provincia;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class EventoEdit extends Component

{
    public $nombre_evento;
    public $evento;
    public $fecha;
    public $SelectDepartamentoEvento;
    public $selectedProvinciaEvento;
    public $detalle;
    //departamento
    public $departamentos;
    //provincias
    public $provincias;
    //opciones del evento
    public $CodigoEvento;

    public function mount(Evento $evento){
        $this->nombre_evento=$evento->name;
        $this->fecha=$evento->fecha;
        $this->SelectDepartamentoEvento=$evento->departamento_id;
        $this->selectedProvinciaEvento=$evento->provincia_id;
        $this->detalle=$evento->detalle;
        $this->CodigoEvento = $evento->codigo_evento;
        //inicilar 
        $this->departamentos=Departamento::all();
        $this->provincias=Provincia::all();
        //opciones del evento
        
    }

    public function updatedSelectDepartamentoEvento($departamento_id){
        //reinicioamos las variables relacionadas
        $this->reset(['selectedProvinciaEvento']);

        //para que se reinicie el select departaemnto
        $this->provincias = Provincia::where('departamento_id',$departamento_id)->get();
    }

    public function update(){
        $validatedData = $this->validate([
            // 'SelectDepartamentoEvento'=>'required|exists:departamentos,id',
            // 'selectedProvinciaEvento'=>'required|exists:provincias,id',
            'SelectDepartamentoEvento'=>'required',
            'selectedProvinciaEvento'=>'required',
            'nombre_evento'=>'required',
            'detalle'=>'required',
            'fecha'=>'required',
            'CodigoEvento'=>'required',
        ]);
        //actualizar eventos
        $this->evento->update([
            'name'=>$this->nombre_evento,
            'fecha'=>$this->fecha,
            'detalle'=>$this->detalle,
            'departamento_id'=>$this->SelectDepartamentoEvento,
            'provincia_id'=>$this->selectedProvinciaEvento,
            'codigo_evento'=>$this->CodigoEvento,
        ]);
        session()->flash('success', 'Datos actualizados correctamente');
        return redirect()->route('admin.eventos.index');
        
    }

    public function render()
    {
        return view('livewire.admin.eventos.evento-edit');
    }
}
