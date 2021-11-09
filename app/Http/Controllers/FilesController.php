<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\files;
use App\Models\acceso;
use App\Models\karnetPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=acceso::all();
        
        $user=Auth::user()->id;
        $files=DB::table('files')
        ->select('actividad','file','types.tipo','types.cantidad','files.id_student','files.id','files.created_at as fecha')
        ->join('types', 'types.id', '=', 'files.id_type')
        ->where('files.id_student',$user)->get();

        $orders = DB::table('files')
                ->select('id_student', DB::raw('SUM(cantidad) as total'))
                ->join('types', 'types.id', '=', 'files.id_type')
                ->where ('files.id_student','=',$user)
                ->groupBy('id_student')
                ->get();
        
        return view('alumno.cat_archivos',compact("files","student","orders","user"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=type::all();
        return view('alumno.add_archivo',["types"=>$type]);
       
    }

    public function karnetPdf($id)
    {
        return karnetPDF::create($id);
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
        $file = files::create($validation);
        if (isset($request["file"])) {
            $file->setFile($validation["file"]);
         }
        return response()->json("Archivo insertado con exito",201);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit(files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=files::find($id);
        $file->delete();
    }
}
