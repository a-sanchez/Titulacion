<?php

namespace App\Http\Controllers;

use App\Models\administrador;
use App\Models\acceso;
use Illuminate\Http\Request;
use App\Models\files;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files=files::all();
        $students=acceso::all();

        $orders = DB::table('files')
                ->select('id_student', DB::raw('SUM(cantidad) as total'))
                ->join('types', 'types.id', '=', 'files.id_type')
                ->where ('files.id_student','=',1)
                ->groupBy('id_student')
                ->get();
                // var_dump($orders);
                // die;
           if ($orders->isEmpty()) {
               $orders[0]=0.0;
           }
        return view('administrador/vista_admin',compact("files","students","orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.add_admin');
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
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(administrador $administrador)
    {
        //
    }
}
