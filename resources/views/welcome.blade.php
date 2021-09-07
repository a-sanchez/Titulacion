@extends('layouts.base')
@section('title')
    Login 
@endsection

@section('styles')
<style>
    body{
        background-size: cover;
        background-image: url('images/login.jpg') no-repeat center center fixed;
        width: 100%;
        
    }
    @media (min-width: 480px) {
    body {
        background-image: url('images/login.jpg');
    }
    }
    @media (min-width: 768px) {
        body {
            background-image: url('images/login.jpg');
        }
    }
    @media (min-width: 1200px) {
        body {
            background-image: url('images/login.jpg');
        }
    }
    @media (max-width: 480px) { body {
        background-image: url('images/login.jpg');
    } }
</style>
    
@endsection
@section('menu')
<div style="height: 100vh;" class="row ms-3 me-3 align-items-center" >
    <div class="col-md-6" style="background:gainsboro;opacity:0.8;" >
        <div class="row d-flex align-self-center">
            <h1 class="mt-3" style="text-align:center;font-weight:bold;">Sistema de administración de créditos escolares</h1>
            <h5 style="text-align:center;" class="animate-box fadeInLeft animated mt-3" data-animate-effect="fadeInLeft">Favor de ingresar los siguientes datos</h5>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="row" >
                <div class="animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                    <form id="login-form" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group mt-3">
                            <input autocomplete="off" id="email" name="email" type="text" class="form-control" placeholder="Matricula/Folio" style="background-color: white;">
                        </div>
                        <div class="form-group mt-3">
                            <input autocomplete="off" id="password" name="password" type="password" class="form-control" placeholder="Contraseña" style="background-color: white;">
                        </div>
                        <div  class="mt-2" style="text-align: end">
                            <a href="usuarios/usuario_nuevo" style="color: blue;">No tienes usuario. Regístrate aquí</a>
                            {{-- <button id="submit" type="submit" class="btn btn-primary btn-send-message">Entrar</button> --}}
                        </div>
                        <div class="form-group my-3" style="text-align: center;">
                            <a href="{{url("/administrador")}}" class="btn btn-success">Iniciar sesión</a>
                            {{-- <button id="submit" type="submit" class="btn btn-primary btn-send-message">Entrar</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection