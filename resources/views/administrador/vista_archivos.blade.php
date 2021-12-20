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
    <div class="row" style="background:red;display:flex;">
        <div class="col-md-1" style="height:40px;">
            <a  style="color: white" href="{{url('administrador/')}}"  class="btn"><i  id="arrow-left"  class="fas fa-arrow-left"></i><b>Regresar</b></a>
            <h1 class=" mb-3 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" >
            </h1>
        </div>
        <div class="col-md-11" style="height:48px;">
            <h1 class=" mb-3 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="font-weight: bold;background:red;color:white;text-align:center">
                ESTUDIANTE: @foreach($students as $student)
                {{$student->nombre_completo}}
                @endforeach
            </h1>
        </div>
    </div>
    <div class="row">
        <h6 style="text-transform:uppercase">
        @foreach($students as $student)
        </br>
        <b>CARRERA:</b>{{$student->carrera}}
        </br>
        <b>MATRICULA:</b>{{$student->matricula}}
        </br>
        <b>SEMESTRE:</b> {{$student->semestre}}
        </br>
        <b>TUTOR:</b>{{$student->tutor}}
            @endforeach</h6>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table pt-2" id="archivos_table" width="100%">
                <thead style="background-color:#000000;color:white">
                    <th>Nombre del archivo</th>
                    <th>Tipo de Cédito</th>
                    <th>Cantidad de créditos</th>
                    <td>Fecha</td>
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
                    <td width="20%">
                        <a   type="button" target="_blank" style="color: red;" href="{{url("/storage/docs/alumnos/{$file->id_student}/{$file->file}")}}" class="btn"><i style="font-size:1.5rem" id="file-alt"  class="fas fa-file-alt"></i></a>
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
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    let table = $("#archivos_table").dataTable({
        
        responsive: true
    });
</script>
@endsection