@extends('layouts.base_html')

@section('tittle')AGREGAR USUARIO
@endsection

@section("body")

    <div class="col-md-12" style="text-align: end;">
        <a href="{{url("/administrador/create")}}" class="btn mt-2" style="background: #b41a1a;color: white;">Administrador</a>
    </div>
<div class="container">
    <div class="col-md-12">
        <h1 class="animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
            ¡BIENVENIDO!
        </h1>
    </div>
    <div class="col-md-12" style="text-align:center">
        <label style="font-size: 20px;">Favor de rellenar los siguientes campos.</label>
    </div>
<form id="form-users" onSubmit='insertUser();'>
    @csrf
    <div class="row d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="user-alt"  class="fas fa-user-alt"></i></a>           
            <label for="nombre_completo" >Nombre Completo</label>
            <input type="text" class="form-control" id="nombre_completo" name='nombre_completo'placeholder="Ingrese nombre completo" required style="background: #DDDDDD;">
        </div>
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="buromobelexperte"  class="fab fa-buromobelexperte"></i></a>
            <label for="matricula" >Matricula</label>
            <input type="text" class="form-control" id="matricula" placeholder="Matricula" name="matricula" required style="background: #DDDDDD;">
        </div>
    </div>
    
    <div class=" mt-2 row d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="calendar-check"  class="far fa-calendar-check"></i></a>
            <label for="semestre" >Semestre</label>
            <input type="text" class="form-control" id="semestre" name='semestre'placeholder="Ingrese su semestre actual(Ej.9)" required style="background: #DDDDDD;">
        </div>
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="envelope"  class="far fa-envelope"></i></a>
            <label for="email" >Email (solo correo institucional) </label>
            <input type="text" class="form-control" id="email" placeholder="Ej.: usuario@uadec.edu.mx" name="email" required style="background: #DDDDDD;">
        </div>
    </div>
    
    <div class=" mt-2 row d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="user-alt"  class="fas fa-user-alt"></i></a>
            <label for="nombre_tutor" >Nombre del Tutor</label>
            <input type="text" class="form-control" id="tutor" name="tutor" required style="background: #DDDDDD;">
        </div>
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="briefcase"  class="fas fa-briefcase"></i></a>
            <label for="nombre_carrera" >Carrera</label>
            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Ej:Ingeniería en Sistemas Computacionales" required style="background: #DDDDDD;">
        </div>
    </div>
    
    <div class=" mt-2 row d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-4">
        <a><i style="font-size:1.5rem;color:red" id="lock"  class="fas fa-lock"></i></a>
            <label for="password">Contraseña (Crea una contraseña)</label>
            <input type="password" name="password" class="form-control" id="password"  required style="background: #DDDDDD;">
        </div>
    </div>
    
    <div class="row d-flex flex-row justify-content-center mb-4 mt-3">
        <div class="col-md-4" style="text-align: center;">
            <button type="submit" class="btn btn-success">Iniciar sesión</button>
            <a class="btn btn-danger" href="../">Cancelar</a>
        </div>
    </button>
    </form>
</div>
@endsection
@section('scripts')
<script>
    async function insertUser(){
        event.preventDefault();
        let form = new FormData(document.getElementById("form-users"));
        let url="{{url('/usuarios')}}";
        let init={
            method:"POST",
            body:form
        }
        let req=await fetch(url,init);
        if(req.ok){
           window.location.href="{{url('/')}}";
        }
        else{
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "Error al registrar usuario"
            });
        }
    }
</script>
@endsection