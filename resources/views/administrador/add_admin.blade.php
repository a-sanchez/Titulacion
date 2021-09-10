@extends('layouts.base_html')

@section('tittle')AGREGAR USUARIO
@endsection

@section("body")
<div class="container mt-3">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <h1 class="animate-box fadeInLeft animated mt-4" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
            ¡BIENVENIDO!
        </h1>
    </div>
    <div class="col-md-12" style="text-align:center">
        <label style="font-size: 20px;">Favor de rellenar los siguientes campos.</label>
    </div>
<form id="form-users" onSubmit='insertAdministrativo();'>
    @csrf
    <div class="row d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="user-alt"  class="fas fa-user-alt"></i></a>           
            <label for="nombre_completo" >Nombre Completo</label>
            <input type="text" class="form-control" id="nombre_completo" name='nombre_completo'placeholder="Ingrese nombre completo" required style="background: #DDDDDD;">
        </div>
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="buromobelexperte"  class="fab fa-buromobelexperte"></i></a>
            <label for="folio" >Folio</label>
            <input type="text" class="form-control" id="matricula" name="matricula" required style="background: #DDDDDD;">
        </div>
    </div>
     <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="envelope"  class="fas fa-envelope"></i></a>
            <label for="nombre_email" >Email (Solo correo institucional) </label>
            <input type="email" class="form-control" id="email" placeholder="Ej.: usuario@uadec.edu.mx" name="email" required style="background: #DDDDDD;">
        </div>
        <div class="col-md-6">
            <a><i style="font-size:1.5rem;color:red" id="user-alt"  class="fas fa-user-alt"></i></a>
            <label for="area" >Área Administrativa</label>
            <input type="text" class="form-control" id="area" name="area" required style="background: #DDDDDD;">
        </div>
    </div>
    <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center">
        <div class="col-md-4">
        <a><i style="font-size:1.5rem;color:red" id="lock"  class="fas fa-lock"></i></a>
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required style="background: #DDDDDD;">
        </div>
    </div>
    <div class="row mt-3 d-flex flex-row justify-content-center mb-4">
        <div class="col-md-4" style="text-align: center;">
            <button type="submit" class="btn btn-success">Iniciar sesión</button>
            <a class="btn btn-danger" href="{{url('/')}}">Cancelar</a>
        </div>
    </button>
    </form>
</div>
@endsection
@section('scripts')
<script>
     async function insertAdministrativo(){
        event.preventDefault();
        let form = new FormData(document.getElementById("form-users"));
        let url="{{url('/administrador')}}";
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