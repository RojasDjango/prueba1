<?php

namespace App\Livewire\Admin\Actividads;

use App\Models\Actividad;
use App\Models\Datospersonal;
use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class ActividadIndex extends Component
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
    //para pasar la fecha actual
    public $fecha_actual='';

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
    public function cargarDatosAutomaticamente()
{
    $idsFaltantes = Datospersonal::whereDoesntHave('actividads')->pluck('id');
    
    $datosInsertar = $idsFaltantes->map(function ($id) {
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
    
    $contador = count($datosInsertar);
    
    if ($contador > 0) {
        Actividad::insert($datosInsertar);
        session()->flash('success', "$contador registros creados exitosamente");
    } else {
        session()->flash('info', 'No se encontraron registros faltantes');
    }
    
    
    $this->initEditedActividads();
}




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
    
    session()->flash('success', 'Cambios guardados correctamente');
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

        //busca el usuario autentificado y captura el id 
        $userId= auth()->user();
        //obteiendo el DNI del usuartio autentificado
        $dniUsuario = $userId->DNI;
        
        //Buscar si el DNI existe en la tabla Ejecutora
        $ejecutoraUsuario = Ejecutora::where('DNI',$dniUsuario)->first();
       
        //si existe que busque 
        if($ejecutoraUsuario){
            
            $query = Actividad::query()->with(['datospersonal.user', 'datospersonal.ejecutora']);

            $userId = auth()->user()->id;

            // ******** para que el search sea ejecutora_id de datos personales pasar el nombre del comando *************
            //obtener datos personales del usuario
            //con ello busco en la tabla datospersonal del usuario autentificado
            //solo para filtrar y que el militante tiene que estar en la tabla 
            //datospersonal


            // $userData = Datospersonal::where('user_id',$userId)->first();


            //capturar el DNI
            // se busca los datos del en la tabla user del usuario autentificado
            $userDNI = User::where('id',$userId)->first();

            
            // if($userData && $userData->ejecutora_id){//Solo entra al bloque si el usuario tiene datos personales y está asignado a una ejecutora
            //     $comando = Ejecutora::find($userData->ejecutora_id);//Así buscarías la ejecutora a la que está asignado el usuario (a través del campo ejecutora_iden sus datos personales
            //         if($comando){//verifica que se encotro una ejecutra 
            //             $this->searchcomando = $comando->name;//asigna el nombre de la ejecutora
            //         }
            //     }
                //******************fin pasar el nombre del comando */



            //*******************para que el search sea de la tabla ejecutora el name */
            $userData = Ejecutora::where('user_id',$userId)->first();

            // ******** pasar el nombre del comando *************
            if($userData && $userData->id){//Solo entra al bloque si el usuario tiene datos personales y está asignado a una ejecutora
            $comando = Ejecutora::find($userData->id);//Así buscarías la ejecutora a la que está asignado el usuario (a través del campo ejecutora_iden sus datos personales
                if($comando){//verifica que se encotro una ejecutra 
                    $this->searchcomando = $comando->name;//asigna el nombre de la ejecutora
                }
            }
            //******************fin pasar del search para pasarlo por la tabla index */



            //*************inicio ****************search entre modelos para el filtro de comandos
            if (!empty($this->searchcomando)) {
            $searchTerm = '%'.$this->searchcomando.'%';
            
                $query->whereHas('datospersonal.ejecutora', function($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'LIKE', $searchTerm);
                });
            }
            }else{
                // El usuario no es coordinador
                $this->searchcomando = 'Usted no es Coordinador';
                $query = Actividad::query()->where('id', 0); // Query vacío
            }

        //la fecha actual inicio*************
            // Establece la fecha actual al cargar el componente
            $this->fecha_actual = now()->format('Y-m-d');
        //fin de la fecha**********


        // $query = Actividad::query()->with('datospersonal');
        $actividads=$query->paginate($this->perPage);


        return view('livewire.admin.actividads.actividad-index',[
            'actividads' => $actividads,'message'=>($ejecutoraUsuario) ? null : 'No tienes permisos de coordinador'
        ]);
    }
}

