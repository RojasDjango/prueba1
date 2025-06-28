<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ejecutora;
use Illuminate\Http\Request;

class EjecutorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ejecutoras=Ejecutora::all();
        return view('admin.ejecutoras.index',compact('ejecutoras'));
    }
    //ver en ejecutora pero solo del usuario que cargo
    public function vercomando(){
        $ejecutoras=Ejecutora::all();
        return view('admin.ejecutoras.comando.index',compact('ejecutoras'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ejecutoras = Ejecutora::all();
        return view('admin.ejecutoras.create',compact('ejecutoras'));
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
    public function edit(Ejecutora $ejecutora)
    {
        //
        //para valida si el autor autentificado es el que esta autorizado
        // $this->authorize('author',$ejecutora);
        return view('admin.ejecutoras.edit',compact('ejecutora'));
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
    public function destroy(Ejecutora $ejecutora)
    {
        ////para valida si el autor autentificado es el que esta autorizado
        // $this->authorize('author',$ejecutora);
        
        //si el nivel del usuario autentificado es desarro o nacional que pase a index
        //caso contrario que pase a vercomandos

        $ejecutora->delete();

        if (in_array(auth()->user()->ejecutora?->nivel, ['Desarrollador', 'Nacional'])) {
            return redirect()->route('admin.ejecutoras.index')->with('success','Se elimino con éxito');
        } else {
            return redirect()->route('admin.ejecutoras.vercomando.index')->with('success','Se elimino con éxito');
        }

        
        
    }
}
