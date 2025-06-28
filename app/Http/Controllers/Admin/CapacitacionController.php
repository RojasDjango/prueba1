<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capacitaciones;
use Illuminate\Http\Request;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $capacitaciones =Capacitaciones::all();
        return view('admin.capacitaciones.index',compact('capacitaciones'));
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
      
       $request->validate([
            'tema'=>'required',
            'alcance'=>'required',
            'enlace'=>'required',
            'fecha'=>'required',
            'descripción'=>'required',
        ]);
    //    
        //retu
        $capacitacion=Capacitaciones::create($request->all());
        
        return redirect()->route('admin.capacitaciones.index',$capacitacion);
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
    public function edit(Capacitaciones $capacitacione)
    {
        //
        return view('admin.capacitaciones.edit',compact('capacitacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Capacitaciones $capacitacione)
    {
        //
        $request->validate([
            'tema'=>'required',
            'alcance'=>'required',
            'enlace'=>'required',
            'fecha'=>'required',
            'descripción'=>'required',
        ]);
        $capacitacione->update($request->all());
        return redirect()->route('admin.capacitaciones.index',$capacitacione);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Capacitaciones $capacitacione)
    {
        //
        $capacitacione->delete();
        return redirect()->route('admin.capacitaciones.index');
    }
}
