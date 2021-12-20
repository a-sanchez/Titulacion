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
            <h1 class=" mb-3 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;background:red;color:white;text-transform:uppercase;">
                ¡BIENVENIDO {{ Auth::user()->nombre_completo}} !
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a type="button" class="btn" id="btnAgregar" href="{{url("alumno/create")}}" style="background:#DD0031;color:white;">Agregar Archivo</a>
        </div>
        <div class="col-md-6" style="text-align: end;">
            <a target="_blank" type="button" class="btn" id="btnGenerar"  href="{{url("karnet_pdf/{$user}")}}" style="background:#2100dd;color:white;">Generar karnet</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table pt-2" id="archivos_table" width="100%">
                <thead style="background-color:#000000;color:white;text-align: center;vertical-align: middle;">
                    <th>Nombre del archivo</th>
                    <th>Tipo de Cédito</th>
                    <th>Cantidad de créditos</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach($files as $file)
                <tr style="vertical-align: middle;">
                    <td>{{$file->actividad}}</td>
                    <td>{{$file->tipo}}</td>
                    <td>{{$file->cantidad}}</td>
                    <td>
                        <?php 
                        $mes = "";
                        switch (date("m", strtotime($file->fecha))) {
                    case '01':
                        $mes1 = "ENERO";
                        break;
                    case '02':
                        $mes1 = "FEBRERO";
                        break;
                    case '03':
                        $mes1 = "MARZO";
                        break;
                    case '04':
                        $mes1 = "ABRIL";
                        break;
                    case '05':
                        $mes1 = "MAYO";
                        break;
                    case '06':
                        $mes1 = "JUNIO";
                        break;
                    case '07':
                        $mes1 = "JULIO";
                        break;
                    case '08':
                        $mes1 = "AGOSTO";
                        break;
                    case '09':
                        $mes1 = "SEPTIEMBRE";
                        break;
                    case '10':
                        $mes1 = "OCTUBRE";
                        break;
                    case '11':
                        $mes1 = "NOVIEMBRE";
                        break;
                    case '12':
                        $mes1 = "DICIEMBRE";
                        break;
                        }
                        $dia = "";
                switch (date("l", strtotime($file->fecha))) {
                    case 'Monday':
                        $dia = "LUNES";
                        break;
                    case 'Tuesday':
                        $dia = "MARTES";
                        break;
                    case 'Wednesday':
                        $dia = "MIERCOLES";
                        break;
                    case 'Thursday':
                        $dia = "JUEVES";
                        break;
                    case 'Friday':
                        $dia = "VIERNES";
                        break;
                    case 'Saturday':
                        $dia = "SABADO";
                        break;
                    case 'Sunday':
                        $dia = "DOMINGO";
                        break;
                }
                        ?>
                        
                    {{$dia}} {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}} {{date("g:i a",strtotime($file->fecha))}}
                    </td>
                    <td>@if ($file->id_estatus == "0")
                        Esperando autorización  
                        @else
                        Autorizado  
                    @endif
                    </td>
                    <td width="15%">
                        <a  type="button" target="_blank" style="color: red;" href="{{url("/storage/docs/alumnos/{$file->id_student}/{$file->file}")}}" class="btn"><i style="font-size:1.5rem" id="file-alt"  class="fas fa-file-alt"></i></a>
                        <a  style="color: black" href="#" onclick='borrarFile({{$file->id}})' class="btn"><i style="font-size:1.5rem" id="trash-alt"  class="fas fa-trash-alt"></i></a>
                    </td>                 
                </tr> 
                 @endforeach 
                 <div class="row mt-3">
                    <label style="text-align: center;">Total de creditos: <input  type="text" disabled value=
                        @if($orders->isEmpty())
                            0
                        @else
                            {{$orders[0]->total}}
                        @endif
                         size="5" style="text-align:center;color:black"></label>
                </div>
                <div class="row mt-4">
                    <label style="text-align: center;">Total de creditos autorizados: <input  type="text" disabled value=
                        @if($orders2->isEmpty())
                            0
                        @else
                            {{$orders2[0]->total}}
                        @endif
                         size="5" style="text-align:center;color:black"></label>
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
