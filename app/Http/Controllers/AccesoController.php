<?php

namespace App\Http\Controllers;

use App\Models\acceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumno.cat_archivos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.add_usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->all();
        $validation["password"]=Hash::make($validation["password"]);
        $user=acceso::create($validation);
        return response()->json("Usuario creado con exito",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function show(acceso $acceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function edit(acceso $acceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, acceso $acceso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(acceso $acceso)
    {
        //
    }
}
