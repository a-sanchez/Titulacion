@extends('layouts.base_html')

@section('tittle')CATALAGO DE CREDITOS
@endsection


@section("styles")
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('lib/DataTables/Responsive-2.2.9/css/responsive.dataTables.min.css') }}">
<style>
    table {
        text-transform: uppercase;
        text-align: center;
        padding:0
    }
    table.dataTable.no-footer {
    border-bottom: 1px solid #fff;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: white;
        border-style: solid;
        border-width: 1px;
        border-bottom:white;
    }
    .table > :not(caption) > * > * {
    padding:0;}

    .table > thead{
        vertical-align:middle;
    }

</style>
@endsection

@section("body")
<div class="mt-3">
    <div class="row">
        <div class="col-12 col-md-12">
            <a href="{{url("/alumno")}} " style="text-decoration: none;"><i id="arrow-circle-left" class="fas fa-arrow-circle-left me-2"></i>Regresar
            <h1 class="animate-box fadeInLeft animated mt-3" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;color: white;background: black;">
                CRÉDITOS ESCOLARES Y EXTRAESCOLARES
            </h1></a>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class=" col-12 col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <table class="table mt-4" id="archivos_table" >
                        <thead style="background:#e92a2a;color:white;font-size: 14px">
                            <th class="w-75">Académico (Como prueba puedes subir fotos, reseñas, pagos de cursos, constancias en el caso de congresos)</th>
                            <th class="w-25">Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Congresos</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Talleres</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Consejeros directivos</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Consejeros universitarios</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Capítulos estudiantiles</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Verano de la ciencia</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Exposiciones,coloquios,maquetas</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Asesoría entre pares</td>
                                <td>1 crédito</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #FBE5D6;">
                                <td>Conferencias (para obtener 1 crédito deberás de contar por lo menos con 5 conferencias por semestre)</td>
                                <td>0.2 crédito</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <table class="table mt-4" id="archivos_table" >
                        <thead style="background:#33CC33;color:white;font-size: 14px">
                            <th>Extensión (como prueba deberás adjuntar foto o reporte de actividad firmado por responsable, se debe de cumplir como mínimo 50 hrs de actividad)</th>
                            <th>Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #E2F0D9">
                                <td>
                                    <ul>
                                        <li>Jornadas de extensión cultural.</li>
                                        <li>Lobos al rescate</li>
                                        <li>Universidad comprometida</li>
                                        <li>Jornadas rurales</li>
                                        <li>Ayudar en tu colonia </li>
                                        <li>Carta a la tierra</li>
                                        <li>REDMIA protección civil</li>
                                        <li>Otros</li>
                                    </ul>
                                </td> 
                                <td>1 crédito (por semestre)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <table class="table mt-4" id="archivos_table" >
                        <thead style="background:#4472C4;color:white;font-size: 14px">
                            <th>Deportivos (Es necesario participar durante un semestre, la evidencia necesita estar avalada por el responsable del programa)</th>
                            <th>Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #DAE3F3;">
                                <td>
                                    <ul>
                                        <li>Béisbol</li>
                                        <li>Softbol</li>
                                        <li>Voleibol</li>
                                        <li>Soccer</li>
                                        <li>Americano</li>
                                        <li>Tochito</li>
                                        <li>Gimnasia</li>
                                        <li>Otros</li>
                                    </ul>
                                </td>
                                <td>1 crédito</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table " id="archivos_table" >
                        <thead style="background:#4B0096;color:white;font-size: 14px">
                            <th>Cultural (Subir archivo de reporte final con su respectivo control de asistencia firmadas por el responsable del programa)</th>
                            <th>Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #D7C9EF">
                                <td>
                                    <ul>
                                        <li>Teatro</li>
                                        <li>Oratoría</li>
                                        <li>Danza</li>
                                        <li>Karate</li>
                                        <li>Otros</li>
                                    </ul>
                                </td> 
                                <td>1 crédito (por semestre)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table mt-2" id="archivos_table" >
                        <thead style="background:#FF6600;color:white;font-size: 14px">
                            <th class="w-75">Tutorías (presentar la hoja de tutorías firmada por el tutor asignado, después de haber aprobado 2 materias de cálculo)</th>
                            <th class="w-25">Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #FFF2CC;">
                                <td>1 sesión individual y 1 grupal </td>
                                <td>1 crédito</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table mt-2" id="archivos_table" >
                        <thead style="background:#660033;color:white;font-size: 14px">
                            <th class="w-75">Titulación (Adjuntar formato de forma de titulación)</th>
                            <th class="w-25">Cantidad de créditos</th>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle;background-color: #C4BAA0;">
                                <td>Tesis, proyectos de investigación y trabajos de titulación. </td>
                                <td>30 créditos</td>
                            </tr>
                            <tr style="vertical-align: middle;background-color: #C4BAA0;">
                                <td>Diplomado, Maestría,  Experiencia profesional o EGEL</td>
                                <td>20 créditos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    let table = $("#archivos_table").dataTable({
        responsive: true
        , searching: false
        , paging: false
        , info: false
        , ordering: false
    });

</script>
@endsection
