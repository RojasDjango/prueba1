<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Datospersonal;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtener el id del usuario autenticado
        $userId = Auth::id();
        //obtener las actividades del usuario autentificado
        $actividades =Actividad::whereHas('user',function($query) use ($userId){
            $query->where('id',$userId);
        })->get();

        //calcular cumplimientos para cada tipo de actividad
        $data = [
            'kick' => 0,
            'facebook' => 0,
            'tiktok' => 0,
            'youtube' => 0,
            'x' => 0,
            'evento_1' => 0,
            'evento_2' => 0,
            'evento_3' => 0,
            'evento_4' => 0,
            'evento_5' => 0,
        ];

        $totalActividades = 0;
        $totalCumple =0;

        foreach($actividades as $actividad){
            foreach($data as $key=>$value){
                $data[$key] += $actividad->$key;
            }
            $totalActividades += count($data); // total de tipo de actividades
        }

        //calcular totales
        $totalCumple = array_sum($data);
        $totalNoCumple = ($totalActividades * count($actividades)) - $totalCumple;

        return view('admin.estadisticas.index', [
            'data' => $data,
            'totalCumple' => $totalCumple,
            'totalNoCumple' => $totalNoCumple,
            'totalActividades' => $totalActividades * count($actividades),
            'actividadesCount' => count($actividades)
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
