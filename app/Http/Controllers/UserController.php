<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/alumno');
        }
        return view("welcome");
    }

    public function inicioSesion(Request $request){
        $credencial =$request->except("_token");
        //print_r ($credencial);
        if(strlen($credencial['matricula'])==8){
            if(Auth::attempt($credencial)){
                $request->session()->regenerate();
                //print_r($request);
                return response()->json("1",200);
                //return json($request);
            }
        }
        else{
            if(Auth::attempt($credencial)){
                
                $request->session()->regenerate();
                return response()->json("2",200);
            }
        }
        return response()->json("Usuario o contraseña incorrectos",400);
    }

    public function salir()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}