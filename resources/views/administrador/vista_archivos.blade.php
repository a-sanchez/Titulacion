@extends('layouts.base_html')
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
                    <th>Fecha</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach($files as $file)
                <tr style="vertical-align: middle;">
                    <td>{{$file->actividad}}</td>
                    <td>{{$file->tipo}}</td>
                    <td>@if ($file->tipo =='OTROS')
                            @if($file->nueva_cantidad == null)
                                {{$file->cantidad}}
                            @else
                                {{$file->nueva_cantidad}}
                            @endif
                        @else
                        {{$file->cantidad}}
                        @endif
                    </td>
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
                    <td>
                        <a type="button" target="_blank" style="color: red;" href="{{url("/storage/docs/alumnos/{$file->id_student}/{$file->file}")}}" class="btn"><i style="font-size:1.5rem" id="file-pdf"  class="fas fa-file-pdf"></i></a>
                        @if($file->id_type==9)
                        <a type="button" class ="btn" style="color:rgb(255, 174, 0)" onclick ="modal({{$file->id}})"><i style="font-size:1.5rem" id="pencil-alt"  class="fas fa-pencil-alt"></i></a> 
                        <form id="form-admin">
                            @csrf
                            <div id="myModal-{{$file->id}}" class="modal fade mt-5" tabindex="-50">
                                <div class="modal-dialog mt-5">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">CAMBIAR CANTIDAD DE CREDITOS</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="admin">INGRESE NUEVA CANTIDAD ASIGNADA</label>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <input type="text" style="text-align:center"  class="form-control" id="nueva_cantidad" name="nueva_cantidad"required >
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" style="background-color: #3a3939;color:white" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn" style="background-color: #af0000;color:white" onclick = "editar('{{$file->id}}');">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        {{-- SE AGREGA CODIGO DEL MODAL PARA EDITAR CANTIDAD EN OPCION DE OTROS --}}
                        <a type="button" style="color:rgb(143, 206, 50)" onclick="autorizado({{$file->id}});"><i style="font-size:1.5rem" id="check-circle"  class="fas fa-check-circle"></i></a>                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{-- EL ARCHIVO YA FUE AUTORIZADO --}}
                        @elseif($file->id_estatus=="0")
                        <a type="button" style="color:rgb(143, 206, 50)" onclick="autorizado({{$file->id}});"><i style="font-size:1.5rem" id="check-circle"  class="fas fa-check-circle"></i></a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @else
                        <a type="button" style="color:black" onclick="cancelar({{$file->id}});"><i style="font-size:1.5rem" id="ban"  class="fas fa-ban"></i></a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @endif
                    </td>                 
                </tr> 
                @endforeach
                <div class="row mt-3">
                    <label style="text-align: center;">Total de creditos autorizados: <input  type="text" disabled value=
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
    function modal(id){
        var myModal = new bootstrap.Modal(document.getElementById(`myModal-${id}`));
            myModal.show();
    }
    async function autorizado(id) {
        event.preventDefault();
        let form = new FormData();
        form.append("id_estatus",1);
        let url="{{url('alumno/{id}')}}".replace("{id}",id);
        let init = {
            method:"PUT",
            headers:{
                'X-CSRF-Token': document.getElementsByName("_token")[0].value
                , "Content-Type": "application/json"
            },
            body:JSON.stringify(Object.fromEntries(form))
        }
        let req = await fetch (url,init);
        if(req.ok){
            alert("Ha autorizado este registro");
            location.reload();
        }
        else{
            Swal.fire({
                icon: 'error'
                , title: 'Error'
                , text: 'Error al actualizar el administrador'
            });
        }

    }

    async function cancelar(id) {
        event.preventDefault();
        let form = new FormData();
        form.append("id_estatus",0);
        let url="{{url('alumno/{id}')}}".replace("{id}",id);
        let init = {
            method:"PUT",
            headers:{
                'X-CSRF-Token': document.getElementsByName("_token")[0].value
                , "Content-Type": "application/json"
            },
            body:JSON.stringify(Object.fromEntries(form))
        }
        let req = await fetch (url,init);
        if(req.ok){
            alert("Se ha cancelado la autorización");
            location.reload();
        }
        else{
            Swal.fire({
                icon: 'error'
                , title: 'Error'
                , text: 'Error '
            });
        }

    }
</script>
@endsection