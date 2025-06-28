<?php

namespace App\Livewire\Admin\Eventos;

use App\Models\Departamento;
use App\Models\Evento;
use Illuminate\Console\Scheduling\Event;
use Livewire\Component;

class EventoIndex extends Component
{
    //buscar
    public $searchDepEvento;
    public $searchProEvento;
    //buscar el usar id
    public $userDataevento='';
    //numero elementos por pagina
    public $perPage=10;


    public function render()
    {
        $query = Evento::query()->with('departamento','provincia');
        // filtros
        // para filtar por departamentos,inicia con una nueva consulta (sin ejecutarla todavia)
        if(!empty($this->searchDepEvento)) {//solo aplica los filtros si hay texto en el campo busqueda
            $query->where(function($q) {//filtra los datos personal que tiene un departamento
                $q->whereHas('departamento', function($subQuery) {//permite filtrar basada entre modelos
                    $subQuery->where('name', 'like', '%'.$this->searchDepEvento.'%');//es una subconsulta, y busca coincidencias
                })
                ->orWhere('departamento_id', 'like', '%'.$this->searchDepEvento.'%');//alternativa busca tambien diramente en el id del departamento
            });
        }

        //provincia
        if(!empty($this->searchProEvento)) {//solo aplica los filtros si hay texto en el campo busqueda
            $query->where(function($q) {//filtra los datos personal que tiene un departamento
                $q->whereHas('provincia', function($subQuery) {//permite filtrar basada entre modelos
                    $subQuery->where('name', 'like', '%'.$this->searchProEvento.'%');//es una subconsulta, y busca coincidencias
                })
                ->orWhere('provincia_id', 'like', '%'.$this->searchProEvento.'%');//alternativa busca tambien diramente en el id del departamento
            });
        }


        $eventos=$query->paginate($this->perPage);
        return view('livewire.admin.eventos.evento-index',compact('eventos'));
    }
}
