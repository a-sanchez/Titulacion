@extends('layouts.base_html')
@section('tittle')
CONFIGURACION PARA CAMBIAR ADMINISTRADOR
@endsection
@section('styles')
<style>
    table {
        text-transform: uppercase;
        text-align: center;
    }

    table, td,th{
      border: 1px solid black;
    }

    td {
    text-align: center;
    vertical-align: middle;
    }

</style>
@endsection
@section('body')
<div class="row">
    <div class="col-md-2" style="height:40px;">
        <a  style="color: red" href="{{url('administrador/')}}"  class="btn"><i  id="arrow-left"  class="fas fa-arrow-left"></i><b class="ms-1">Regresar</b></a>
        </h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <div class="row mt-4" style="text-align:center">
                <div class="col-md-12">
                    <h1 class="animate-box fadeInLeft animated mt-2" data-animate-effect="fadeInLeft">
                        CONFIGURACION PARA CAMBIAR ADMINISTRADOR
                    </h1>
                    <hr style="color: red;">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="admin" class="table" width="100%">
                        <thead style="background-color:#000000;color:white">
                            <th>Administrador</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$administrador[0]->administrador}}
                                </td>
                                <td>
                                    <button  type="button" id = "myBtn" style="color: #da012f " class="btn" href="" onclick ="modal({{$administrador[0]->id}})" ><i style="font-size:1.5rem;" id="pencil-alt"  class="fas fa-pencil-alt"></i></button> 
                                    <form id="form-admin">
                                        @csrf
                                        <div id="myModal-{{$administrador[0]->id}}" class="modal fade mt-5" tabindex="-50">
                                            <div class="modal-dialog mt-5">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">CAMBIAR ADMINISTRADOR</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="admin">INGRESE NOMBRE DEL ADMINISTRADOR COMPLETO</label>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="text" style="text-align:center"  class="form-control" id="administrador" name="administrador"required >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" style="background-color: #3a3939;color:white" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn" style="background-color: #af0000;color:white" onclick = "editar('{{$administrador[0]->id}}');">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let table=$("#admin").DataTable({
        responsive:true,
        searching:false,
        paging:false,
        info:false
    });

    function modal(id){
        var myModal = new bootstrap.Modal(document.getElementById(`myModal-${id}`));
            myModal.show();
    }

    async function editar(id){
        event.preventDefault();
        let admin = document.getElementById("administrador").value;
        let form = new FormData();
        form.append("administrador",admin);
        let url = "{{url('configuracion/{id}')}}".replace("{id}",id);
        let init = {
            method:"PUT",
            headers:{
                'X-CSRF-Token': document.getElementsByName("_token")[0].value
                , "Content-Type": "application/json"
            },
            body:JSON.stringify(Object.fromEntries(form))
        }
        let req = await fetch(url,init);
        if(req.ok){
            alert("Se ha actualizado correctamente");
            window.location.href="{{url('/administrador')}}";
        }
        else{
            Swal.fire({
                    icon: 'error'
                    , title: 'Error'
                    , text: 'Error al actualizar el administrador'
                });
        }
    }
</script>
@endsection