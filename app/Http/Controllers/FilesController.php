<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;
use App\Models\type;
use App\Models\acceso;
use Illuminate\Support\Facades\DB;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=files::all();
        $student=acceso::all();

        $orders = DB::table('files')
                ->select('id_student', DB::raw('SUM(cantidad) as total'))
                ->join('types', 'types.id', '=', 'files.id_type')
                ->where ('files.id_student','=',1)
                ->groupBy('id_student')
                ->get();
        return view('alumno.cat_archivos',compact("files","student","orders"));


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
