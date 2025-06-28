<?php

namespace App\Livewire\Admin\Actividads\Programador;

use App\Models\Actividad;
use App\Models\Datospersonal;
use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProgIndex extends Component
{
    //pagina
    use WithPagination;
    //numero elementos por pagina
    public $perPage=40;
    // Almacena los cambios antes de guardar
    public $editedActividads = [];
    //
    public $searchcomando='';
    //buscar el DNI en tabla ejecutora
    public $dniUsuario='';

    protected $paginationTheme = "bootstrap";



    // Campos booleanos a manejar
    public $booleanFields = [
        'facebook',
        'youtube',
        'tiktok',
        'x',
        'kick',
        'evento_1',
        'evento_2',
        'evento_3',
        'evento_4',
        'evento_5',
    ];


    //Valores por defecto para la carga automática y actualizar los datos 
    //que estan en datospersonals a la tabla actividads
    public $defaultValues = [
        'facebook' => '0',
        'youtube' => '0',
        'tiktok' => '0',
        'x' => '0',
        'kick' => '0',
        'evento_1' => '0',
        'evento_2' => '0',
        'evento_3' => '0',
        'evento_4' => '0',
        'evento_5' => '0',
    ];
    //****************fin de defaultvalues */


    public function mount(){
        $this->initEditedActividads();
    }

    //******metodo para cargar datos automaticamente */
    //guarda los datos aun existe o no exista en la tabla actividad
    //permite que con un boton se borre todo y el personal mejora 
    public function cargarDatosAutomaticamente()
    {
        // 1. Sobrescribir TODOS los registros existentes en actividads (resetear a 0)
        Actividad::query()->update([
            'facebook' => '0',
            'youtube' => '0',
            'tiktok' => '0',
            'x' => '0',
            'kick' => '0',
            'evento_1' => '0',
            'evento_2' => '0',
            'evento_3' => '0',
            'evento_4' => '0',
            'evento_5' => '0',
            'updated_at' => now()
        ]);

        // 2. Registrar NUEVOS datospersonals que no tengan actividad
        $idsFaltantes = Datospersonal::whereDoesntHave('actividads')->pluck('id');

        $nuevosRegistros = $idsFaltantes->map(function ($id) {
            return [
                'datospersonal_id' => $id,
                'facebook' => '0',
                'youtube' => '0',
                'tiktok' => '0',
                'x' => '0',
                'kick' => '0',
                'evento_1' => '0',
                'evento_2' => '0',
                'evento_3' => '0',
                'evento_4' => '0',
                'evento_5' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ];
        })->toArray();

        if (!empty($nuevosRegistros)) {
            Actividad::insert($nuevosRegistros);
        }

        // 3. Feedback y actualización
        $totalActualizados = Actividad::count(); // Todos fueron actualizados
        $nuevosCreados = count($nuevosRegistros);

        session()->flash('success', 
            "Se resetearon {$totalActualizados} registros a 0 y se crearon {$nuevosCreados} nuevos"
        );

        $this->initEditedActividads();
    }
    // public function cargarDatosAutomaticamente()
    // {   //verifica si ya se tiene los datos en la tabla actividads, y no se repita
    //     $idsFaltantes = Datospersonal::whereDoesntHave('actividads')->pluck('id');
        
    //     $datosInsertar = $idsFaltantes->map(function ($id) {
    //         return [
    //             'datospersonal_id' => $id,
    //             'facebook' => '0',
    //             'youtube' => '0',
    //             'tiktok' => '0',
    //             'x' => '0',
    //             'kick' => '0',
    //             'evento_1' => '0',
    //             'evento_2' => '0',
    //             'evento_3' => '0',
    //             'evento_4' => '0',
    //             'evento_5' => '0',
    //             'created_at' => now(),
    //             'updated_at' => now()
    //         ];
    //     })->toArray();
        
    //     $contador = count($datosInsertar);
        
    //     if ($contador > 0) {
    //         Actividad::insert($datosInsertar);
    //         session()->flash('success', "$contador registros creados exitosamente");
    //     } else {
    //         session()->flash('info', 'No se encontraron registros faltantes');
    //     }
        
    //     $this->initEditedActividads();
    // }




    // public function cargarDatosAutomaticamente()
    // {
    //     Datospersonal::each(function ($datospersonal) {
    //         Actividad::updateOrCreate(
    //             ['datospersonal_id' => $datospersonal->id],
    //             $this->defaultValues
    //         );
    //     });
        
    //     session()->flash('success', 'Datos cargados automáticamente para todos los registros');
    //     $this->initEditedActividads(); // Refrescar los datos mostrados
    // }
    //**************din de metodo para cargar datos automaticos */














    // Inicializa el array de edición, etidar en la tabla
    public function initEditedActividads(){
        $this->editedActividads = [];
        $actividads = Actividad::with(['datospersonal.user', 'datospersonal.ejecutora'])
        ->paginate($this->perPage);

        foreach ($actividads as $actividad) {
            $this->editedActividads[$actividad->id] = [
                'id' => $actividad->id,
                'facebook' => (bool)$actividad->facebook,
                'youtube' => (bool)$actividad->youtube,
                'tiktok' => (bool)$actividad->tiktok,
                'x' => (bool)$actividad->x,
                'kick' => (bool)$actividad->kick,
                'evento_1' => (bool)$actividad->evento_1,
                'evento_2' => (bool)$actividad->evento_2,
                'evento_3' => (bool)$actividad->evento_3,
                'evento_4' => (bool)$actividad->evento_4,
                'evento_5' => (bool)$actividad->evento_5,
            ];
        }
    }

    // Alternar el valor de un campo booleano
    public function toggleField($actividadId, $field)
    {
        if (isset($this->editedActividads[$actividadId])) {
            $this->editedActividads[$actividadId][$field] = !$this->editedActividads[$actividadId][$field];
        }
    }

    // Guardar todos los cambios
    public function saveChanges()
    {
        foreach ($this->editedActividads as $actividadId => $changes) {
            $updateData = [];
            
            foreach ($changes as $key => $value) {
                if (in_array($key, $this->booleanFields)) {
                    // Convertir a string '0' o '1' para ENUM
                    $updateData[$key] = $this->normalizeEnumValue($value);
                } else {
                    $updateData[$key] = $value;
                }
            }
            
            Actividad::where('id', $actividadId)->update($updateData);
        }
        
        session()->flash('message', 'Cambios guardados correctamente');
        $this->initEditedActividads();
    }

    protected function normalizeEnumValue($value)
    {
        // Convierte cualquier formato booleano a '0' o '1'
        if (is_bool($value)) {
            return $value ? '1' : '0';
        }
        if (is_int($value) || is_float($value)) {
            return $value ? '1' : '0';
        }
        if (is_string($value)) {
            return in_array(strtolower($value), ['1', 'true', 'on', 'yes']) ? '1' : '0';
        }
        return '0'; // Valor por defecto
    }


    public function render()
    {
         //si existe que busque 
            $query = Actividad::query()->with(['datospersonal.user', 'datospersonal.ejecutora']);
 
            $userId = auth()->user()->id;
             //obtener datos personales del usuario
             //con ello busco en la tabla datospersonal del usuario autentificado
             //solo para filtrar y que el militante tiene que estar en la tabla 
             //datospersonal
            $userData = Datospersonal::where('user_id',$userId)->first();
 
             //*************inicio ****************search entre modelos para el filtro de comandos
            //comando
            if (!empty($this->searchcomando)) {
                $searchTerm = '%'.$this->searchcomando.'%';
                
                    $query->whereHas('datospersonal.ejecutora', function($subQuery) use ($searchTerm) {
                        $subQuery->where('name', 'LIKE', $searchTerm);
                    });
                }
            //**********find e filtros********
         
         // $query = Actividad::query()->with('datospersonal');
         $actividads=$query->paginate($this->perPage);

        return view('livewire.admin.actividads.programador.prog-index',[
            'actividads' => $actividads]);
    }
}
