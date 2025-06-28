<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatospersonalRequest;
use App\Models\Datospersonal;
use App\Models\Departamento;
use App\Models\Ejecutora;
use App\Models\Provincia;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DatospersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //lista nacional
    public function index()
    {
        //
        $datopersonals=Datospersonal::all();
        return view('admin.datospersonals.index',compact('datopersonals'));
    }

    //lista departamental
    public function departamentoindex(){
        $datospersonal = Datospersonal::all();
        return view('admin.datospersonals.departamento.index',compact('datospersonal'));
    }
    public function provinciaindex(){
        $datospersonal = Datospersonal::all();
        return view('admin.datospersonals.provincia.index',compact('datospersonal'));
    }
    public function distritoindex(){
        $datospersonal = Datospersonal::all();
        return view('admin.datospersonals.distrito.index',compact('datospersonal'));
    }


    //se crea esta funcion solo para mostrar los datos del usuario autentificado y liberar a index
    public function dato(){
        return view('admin.datospersonals.datos');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //captural el id del usuario autentificado

        // $userId=Auth::id();//obtiene el Id del usuario autenticado
        // if($userId){
        //     $users=User::pluck('name','id');
        // }

        // $departamentos=Departamento::all();
        // $sectors=Sector::pluck('name','id');
        // $provincias=Provincia::pluck('name','id');
        // $ejecutoras=Ejecutora::pluck('name','id');
        
        return view('admin.datospersonals.create');

        
    }

    public function store(Request $request)
    {
        
        Datospersonal::create($request->all());
        return redirect()->route('admin.socialnetworks.index');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('admin.datospersonals.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datospersonal $datospersonal)
    {
        
        return view('admin.datospersonals.edit',compact('datospersonal'));
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
    public function destroy(Datospersonal $datospersonal)
    {
        //para dirigirlo al index correcto
        $nivelejecutora = Ejecutora::where('user_id',auth()->user()->id)->first();
        //que busque en la tabla ejecutora, si hay que no elimine 
        if (Ejecutora::where('user_id', $datospersonal->user_id)->exists()) {
            // Retornar respuesta de error (para API)

         // Redirigir según el nivel
            switch ($nivelejecutora->nivel) {
            case 'Desarrollador':
            case 'Nacional':
                return redirect()->route('admin.datospersonals.index')->with('success1','No puedes eliminarlo¡ El Militante Tiene un comando a su cargo');
            case 'Regional':
                return redirect()->route('admin.datospersonals.departamento.index')->with('success1','No puedes eliminarlo¡ El Militante Tiene un comando a su cargo');
            case 'Provincia':
                return redirect()->route('admin.datospersonals.provincia.index')->with('success1','No puedes eliminarlo¡ El Militante Tiene un comando a su cargo');
            default:
                return redirect()->route('admin.datospersonals.distrito.index')->with('success1','No puedes eliminarlo¡ El Militante Tiene un comando a su cargo');
            }
            // return redirect()->route('admin.datospersonals.index')->with('success1','No puedes eliminarlo¡ El Militante Tiene un comando a su cargo');
        } else {
            // Primero obtenemos el usuario relacionado
            $user = $datospersonal->user;
            
            // Eliminamos el datospersonal
            $datospersonal->delete();
            
            // Luego eliminamos el usuario
            $user->delete();
        }

         // Redirigir según el nivel
        switch ($nivelejecutora->nivel) {
        case 'Desarrollador':
        case 'Nacional':
            return redirect()->route('admin.datospersonals.index')->with('success', 'La etiqueta se eliminó con éxito');
        case 'Regional':
            return redirect()->route('admin.datospersonals.departamento.index')->with('success', 'La etiqueta se eliminó con éxito');
        case 'Provincia':
            return redirect()->route('admin.datospersonals.provincia.index')->with('success', 'La etiqueta se eliminó con éxito');
        default:
            return redirect()->route('admin.datospersonals.distrito.index')->with('success', 'La etiqueta se eliminó con éxito');
        }

        // $datospersonal->delete();
        // return redirect()->route('admin.datospersonals.index')->with('success','la etiqueta se elimino con éxito');
    }
}
