<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\administrador_creditos;

class AdministradorCreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $administrador=DB::table('administrador_creditos')
        ->select('administrador','id')
        ->where('id',1)->get();
        return view('administrador.cambio',compact("administrador"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\administrador_creditos  $administrador_creditos
     * @return \Illuminate\Http\Response
     */
    public function show(administrador_creditos $administrador_creditos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\administrador_creditos  $administrador_creditos
     * @return \Illuminate\Http\Response
     */
    public function edit(administrador_creditos $administrador_creditos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\administrador_creditos  $administrador_creditos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $administrador = administrador_creditos::find($id);
        $update=$administrador->update($request->all());
        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\administrador_creditos  $administrador_creditos
     * @return \Illuminate\Http\Response
     */
    public function destroy(administrador_creditos $administrador_creditos)
    {
        //
    }
}
