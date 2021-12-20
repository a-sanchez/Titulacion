@extends('layouts.base_html')

@section('tittle')CATALAGO DE ARCHIVOS ADMINISTRADOR
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
    <div class="row">
        <div class="col-12">
            <table class="table pt-2" id="archivos_table" width="100%">
                <thead style="background-color:#000000;color:white">
                    <th>Nombre del alumno</th>
                    <th>Matricula</th>
                    <th>Semestre</th>
                    <th>Tutor</th>
                    <th>Cantidad de créditos</th>
                    <th>Archivos</th>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr style="vertical-align: middle;">
                        <td>{{$student->nombre_completo}}</td>
                        <td>{{$student->matricula}}</td>
                        <td>{{$student->semestre}}</td>
                        <td>{{$student->tutor}}</td>
                        <td> {{$student->getCreditos()}}</td>
                        <td style="text-align:center">  
                            <a  target="_blank" type="button" style="color: red;" href="{{url("administrador/{$student->id}")}}"  class="btn"><i style="font-size:1.5rem" id="file-alt"  class="fas fa-file-alt"></i></a>
                            <a  target="_blank" type="button" style="color: red;" href="{{url("karnet_pdf/{$student->id}")}}"  class="btn"><i style="font-size:1.5rem" id="tasks"  class="fas fa-tasks"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer class="d-flex align-items-center">
            <p class="mt-3">Si deseas conocer cuantos créditos se otorgan por actividad dar clic al icono </p>
            <a class="ms-3 "href={{url("creditos/creditos")}}><i style="font-size:2rem;color:red" id="list-alt"  class="far fa-list-alt"></i></a>
    </footer>
    <footer class="d-flex align-items-center">
        <a class="mt-3" style="color: red;font-weight: bold;text-decoration:none" href={{url("/configuracion")}}>Configuración</a>
        <a class="mt-3" href={{url("/configuracion")}} ><i style="font-size:1.5rem;color:red" id="user-cog"  class="fas fa-user-cog"></i></a>
    </footer>
</div>
@endsection

@section("scripts")
<script>
    let table = $("#archivos_table").DataTable({
        responsive: true
    });
</script>
@endsection