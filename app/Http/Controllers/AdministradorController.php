<?php

namespace App\Http\Controllers;

use App\Models\files;
use App\Models\acceso;
use Illuminate\Http\Request;
use App\Models\administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $students=acceso::whereRaw('LENGTH(matricula) = 8')->get();
        $orders = DB::table('files')
                ->select('id_student','id_type',DB::raw('SUM(types.cantidad) as total'))
                ->join('types', 'types.id', '=', 'files.id_type')
                ->groupBy('id_student')
                ->get();
           if ($orders->isEmpty()) {
               $orders[0]=0;
           }
           if(strlen(Auth::user()->matricula)==5){
            return view('administrador/vista_admin',compact("files","students","orders"));
           }
           return redirect('/alumno');
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
    public function show(Request $request,$id)
    {
        $students = acceso::where('id',$id)->get();
        $files=DB::table('files')
        ->select('actividad','file','types.tipo','types.cantidad','files.id_student','files.id','files.created_at as fecha','files.id_estatus','files.id_type','files.nueva_cantidad')
        ->join('types', 'types.id', '=', 'files.id_type')
        ->where('files.id_student',$id)->get();
        $orders = DB::table('files')
        ->select('id_student', DB::raw('SUM(cantidad) as total'))
        ->join('types', 'types.id', '=', 'files.id_type')
        ->where ('files.id_student','=',$id)
        ->where('files.id_estatus','=','1')
        ->groupBy('id_student')
        ->get();
        // dump($files);
        // die;
        return view('administrador.vista_archivos',compact('files','students','orders'));
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
