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
            <table class="table pt-2" id="archivos_table">
                <thead style="background-color:#000000;color:white">
                    <th>Nombre del alumno</th>
                    <th>Semestre</th>
                    <th>Tutor</th>
                    <th>Cantidad de créditos</th>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr style="vertical-align: middle;">
                    <td>{{$student->nombre_completo}}</td>
                    <td>{{$student->semestre}}</td>
                    <td>{{$student->tutor}}</td>
                    <td>                        
                        @if($orders[0]==0)
                        0
                        @else 
                        {{$orders[0]->total}}
                        @endif

                    </td>               
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer class="d-flex align-items-center">
      <p class="m-0">Si deseas conocer cuantos créditos se otorgan por actividad dar clic al icono </p>
     <a class="ms-3 "href={{url("creditos/creditos")}}><i style="font-size:2rem;color:red" id="list-alt"  class="far fa-list-alt"></i></a>
    </footer>
</div>
@endsection
@section("scripts")
<script>
    let table = $("#archivos_table").dataTable({
        responsive: true
    });

</script>
@endsection
