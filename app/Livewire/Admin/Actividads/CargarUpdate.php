<?php

namespace App\Livewire\Admin\Actividads;

use App\Models\Datospersonal;
use Livewire\Component;
use App\Models\Actividad;

class CargarUpdate extends Component
{
    public $search;
    public $perPage = 10;

    public $dedaultValues=[
    
    'kick' =>0,
    'facebook'=>0,
    'tiktok'=>0,
    'youtube'=>0,
    'x'=>0,
    'evento_1'=>0,
    'evento_2'=>0,
    'evento_3'=>0,
    'evento_4'=>0,
    'evento_5'=>0,
    ];
    

    public function cargarDatosAutomaticamente(){
        
        Datospersonal::each(function ($datospersonal) {
            Actividad::updateOrCreate(
                ['datospersonal_id' => $datospersonal->id],
                $this->defaultValues
            );
        });
        
        session()->flash('success', 'Datos cargados automáticamente para todos los personal');
        $this->dispatch('refreshComponent'); // Opcional: si necesitas refrescar algún componente
    }
    
    // Render mínimo (no necesita vista propia)
    public function render()
    {
        $actividads = Actividad::query()
            ->with('datospersonal') // Asegúrate de tener esta relación definida
            ->when($this->search, function ($query) {
                $query->whereHas('datospersonal', function ($q) {
                    $q->where('nombre', 'like', '%'.$this->search.'%');
                });
            })
            ->latest()
            ->paginate($this->perPage);
            
        return view('livewire.admin.actividads.actividad-index',compact('actividads') );
        // return view('livewire.admin.actividads.actividad-index');
    }
}
