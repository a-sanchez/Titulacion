@extends('layouts.base_html')

@section('tittle')CATALAGO DE ARCHIVOS ALUMNO
@endsection

@section("styles")
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('lib/DataTables/Responsive-2.2.9/css/responsive.dataTables.min.css') }}">
<style>
    table {
        text-transform: uppercase;
        text-align: center;
    }
</style>
@endsection

@section("body")
<div class="mt-3">
    <div class="row">
        <div class="col-12 col-md-12">
            <h1 class=" mb-3 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;background:red;color:white;">
                ¡BIENVENIDO {{ Auth::user()->nombre_completo}} !
            </h1>
        </div>
    </div>
    <a type="button" class="btn" id="btnAgregar" href={{url("alumno/create")}} style="background:#DD0031;color:white;">Agregar Archivo</a>
    <div class="row">
        <div class="col-12">
            <table class="table pt-2" id="archivos_table" width="100%">
                <thead style="background-color:#000000;color:white">
                    <th>Nombre del archivo</th>
                    <th>Tipo de Cédito</th>
                    <th>Cantidad de créditos</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach($files as $file)
                    
                <tr style="vertical-align: middle;">
                    <td>{{$file->actividad}}</td>
                    <td>{{$file->type->tipo}}</td>
                    <td>{{$file->type->cantidad}}</td>
                    <td width="20%">
                        <a  type="button" style="color: red;" href="{{url("/storage/docs/alumnos/{$file->id_student}/{$file->file}")}}" class="btn"><i style="font-size:1.5rem" id="file-alt"  class="fas fa-file-alt"></i></a>
                        <a  style="color: black" href="#" onclick='borrarFile({{$file->id}})' class="btn"><i style="font-size:1.5rem" id="trash-alt"  class="fas fa-trash-alt"></i></a>
                    </td>                 
                </tr> 
                 @endforeach 
                 <div class="row mt-3">
                    <label style="text-align: center;">Total de creditos: <input  type="text" disabled value="{{$orders[0]->total}}" size="5" style="text-align:center;color:black"></label>
                </div>    
                </tbody>
            </table> 
        </div>
    </div>
    <footer class="d-flex align-items-center">
      <p class="m-4">Si deseas conocer cuantos créditos se otorgan por actividad dar clic al icono </p>
     <a href={{url("creditos/view_creditos")}}><i style="font-size:2rem;color:red" id="list-alt"  class="far fa-list-alt"></i></a>
    </footer>
</div>
@endsection
@section("scripts")
<script>
    let table = $("#archivos_table").dataTable({
        
        responsive: true
    });
    
     async function borrarFile(id) {
    event.preventDefault();
    let url='{{url("/alumno/{id}")}}'.replace('{id}',id);
    let init = {
        method: "DELETE",
        headers: {  'X-CSRF-TOKEN': "{{csrf_token()}}" }
        }
    
    let req=await fetch(url,init);
    if (req.ok){
        location.reload();
    }
    else{
        Swal.fire({
            icon:"error",
            title:"Error",
            text:"ERROR AL BORRAR ARCHIVO"
        });
    }
    }
</script>
@endsection
