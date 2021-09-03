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
            <h1 class="animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
                ¡BIENVENIDO!
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
                <tr style="vertical-align: middle;">
                    <td>ANGELA GABRIELA SANCHEZ NIÑO</td>
                    <td>9</td>
                    <td>EDITH CARVAJAL</td>
                    <td>25</td>               
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
