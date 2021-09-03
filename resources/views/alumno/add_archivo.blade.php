@extends('layouts.base_html')

@section('tittle')CATALAGO DE ARCHIVOS
@endsection

@section("styles")
<style>
    .btn-primary{
        background: #0d6efd;
        border: #0d6efd;
    }

</style>
@endsection

@section("body")
<div class="container mt-3">
    <div class="col-md-12">
        <h2 class="animate-box fadeInLeft animated mt-4" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
            Agregar un nuevo archivo
        </h2>
        <h5 class="animate-box fadeInLeft animated mt-2" data-animate-effect="fadeInLeft" style="text-align:center;">Favor de rellenar los siguientes campos</h5>
    </div>
    <form id="form-users" onSubmit='insertArchivo();'>
        @csrf
        <div class="row d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-6 mt-3">
                <label for="nombre_actividad" >Titulo/Actividad (en caso de ser una conferencia nombrarla CONFERENCIA...)</label>
                <input type="text" class="form-control" id="actividad" name="actividad" required style="background: #DDDDDD;">
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-6">
            <label for="tipo_credito" >Tipo de crédito</label>
            <select class="form-control" id="tipo_credito" name="tipo_credito" style="background: #DDDDDD;"></select>
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center" style="text-align: center;">
            <div class="col-md-6">
            <label for="file" >Adjuntar archivo</label>
            <input type="file" class="form-control-file" id="file" name="file" required style="background: #DDDDDD;">
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center mb-4">
            <div class="col-md-6" style="text-align: center;">
                <a href="#" class="btn btn-primary">Guardar</a>
                <a class="btn btn-danger" href="../alumno/catalogo">Cancelar</a>
            </div>
        </button>
        </form>
</div>
@endsection
