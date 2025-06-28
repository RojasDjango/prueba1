<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ejecutora;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.users.index');
    }
    public function nacional(){
        return view('admin.users.nacional.index');
    }
    public function regional(){
        return view('admin.users.regional.index');
    }
    public function provincial(){
        return view('admin.users.provincial.index');
    }
    public function distrital(){
        return view('admin.users.distrital.index');
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
    public function edit(User $user)
    {
        //
        $ejecutoras=Ejecutora::all();
        //
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles','ejecutoras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        
        $user->roles()->sync($request->roles);

        //para que dirija al index correcto
        $nivelejecutora = Ejecutora::where('user_id',auth()->user()->id)->first();
        //que busque en la tabla ejecutora, si hay que no elimine
        // Redirigir según el nivel
        switch ($nivelejecutora->nivel) {
            case 'Desarrollador':
            case 'Nacional':
                return redirect()->route('admin.users.index')->with('success1','Se asigno los roles correctamente de los responsable/coordinador ');
            case 'Regional':
                return redirect()->route('admin.users.regional.index')->with('success1','Se asigno los roles correctamente de los responsable/coordinador ');
            case 'Provincia':
                return redirect()->route('admin.users.provincial.index')->with('success1','Se asigno los roles correctamente de los responsable/coordinador ');
            default:
                return redirect()->route('admin.users.distrital.index')->with('success1','Se asigno los roles correctamente de los responsable/coordinador ');
            }
        
        // return redirect()->route('admin.users.index',$user)->with('info','Se asigno los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
