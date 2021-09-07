@extends('layouts.base_html')

@section('tittle')CATALAGO DE ARCHIVOS
@endsection

@section("styles")
<style>
    .btn-primary{
        background: #0d6efd;
        border: #0d6efd;
    }

</style>
@endsection

@section("body")
<div class="container mt-3">
    <div class="col-md-12">
        <h2 class="animate-box fadeInLeft animated mt-4" data-animate-effect="fadeInLeft" style="text-align:center;font-weight: bold;">
            Agregar un nuevo archivo
        </h2>
        <h5 class="animate-box fadeInLeft animated mt-2" data-animate-effect="fadeInLeft" style="text-align:center;">Favor de rellenar los siguientes campos</h5>
    </div>
    <form id="form-files" onSubmit='insertArchivo();'>
        @csrf
        <div class="row d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-6 mt-3">
                <label for="nombre_actividad" >Titulo/Actividad (en caso de ser una conferencia nombrarla CONFERENCIA...)</label>
                <input type="text" class="form-control" id="actividad" name="actividad" required style="background: #DDDDDD;">
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-6">
            <label for="tipo_credito" >Tipo de crédito</label>
            <select class="form-select" id="id_type" name="id_type" style="background: #DDDDDD;">
                <option selected disabled value="0">Seleccione:</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->tipo}}</option>
                    @endforeach
            </select>
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center" style="text-align: center;">
            <div class="col-md-6">
            <label for="file" >Adjuntar archivo</label>
            <input type="file" class="form-control-file" id="file" name="file" style="background: #DDDDDD;">
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center mb-4">
            <div class="col-md-6" style="text-align: center;">
                <button type="submit" href="#" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href={{url("/alumno")}}>Cancelar</a>
            </div>
        </button>
        </form>
</div>
@endsection

@section('scripts')
<script>
    async function insertArchivo(){
        event.preventDefault();
        let form=new FormData(document.getElementById("form-files"));
        form.append("id_type",document.getElementById("id_type").value);
        form.append("id_student",1);
        let url = "{{url('/alumno')}}";
        let init={
            method:"POST",
            body:form
        }
        console.log(init);
        let req=await fetch(url,init);
        if(req.ok){
            //window.location.href="{{url('/alumno')}}";
        }
        else{
            Swal.fire({
                icon:'error',
                tittle:'Error',
                text:"Error al insertar el archivo"
            });
        }
    }
    
</script>
@endsection
