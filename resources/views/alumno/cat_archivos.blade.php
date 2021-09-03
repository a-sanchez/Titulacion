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
            <h1 class="animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
                ¡BIENVENIDO!
            </h1>
        </div>
    </div>
    <a type="button" class="btn" id="btnAgregar" href="../alumno/agregar_archivo" style="background:#DD0031;color:white;">Agregar Archivo</a>
    <div class="row">
        <div class="col-12">
            <table class="table pt-2" id="archivos_table">
                <thead style="background-color:#000000;color:white">
                    <th>Nombre del archivo</th>
                    <th>Tipo de Cédito</th>
                    <th>Cantidad de créditos</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                <tr style="vertical-align: middle;">
                    <td>CONFERENCIA INDUSTRIA 4.0</td>
                    <td>ACADEMICO</td>
                    <td>2.0</td>
                    <td width="15%">
                        <a  type="button" style="color: red;" href="#" class="btn"><i style="font-size:1.5rem" id="file-alt"  class="fas fa-file-alt"></i></a>
                        <a  type="button" style="color: #f7dd0b; " class="btn"  href="#"><i style="font-size:1.5rem;" id="pen"  class="fas fa-pen"></i></a>
                        <a  style="color: black" href="#" class="btn"><i style="font-size:1.5rem" id="trash-alt"  class="fas fa-trash-alt"></i></a>
                    </td>                 
                </tr>
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
