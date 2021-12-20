
@php
    $num = 0;
@endphp
<table width="100%" style="text-align:center"  class="uppercase">
<tr>
    <td><b>NOMBRE COMPLETO:</b> {{$student->nombre_completo}}</td>
</tr>
<tr >
    <td ><b>CARRERA:</b> {{Str::upper($student->carrera)}}</td>
</tr>
<tr>
    <td><b>MATRICULA:</b>{{$student->matricula}}</td>
</tr>
<tr>
    <td></td>
</tr>
</table>

<table width="100%" style="text-align:center" >
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Administrativo</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
<tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
<td border=".5" width="8%">N°</td>
<td border=".5" width="47%">Descripción</td>
<td border=".5" width="30%">Fecha</td>
<td border=".5" width="15%">No. Créditos</td>
</tr>
@foreach($files as $file)
@if($file->id_type==1)
<tr style="text-align:center;line-height: 20px;">
    <td border=".5">@php
        $num+=1;
    @endphp
    {{$num}}</td>
    <td border=".5">
        {{$file->actividad}}
    </td>
    <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">{{$file->cantidad}}   </td>
</tr>
@endif
@endforeach
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Administrativo(Conferencia)</td>
    </tr>
</table>
<table width="100%" style="text-align:center" >
<tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
<td border=".5" width="8%" >N°</td>
<td border=".5" width="47%">Descripción</td>
<td border=".5" width="30%">Fecha</td>
<td border=".5" width="15%">No. Créditos</td>
</tr>
@foreach($files as $file)
@if($file->id_type==2)
    
    <tr style="text-align:center;line-height: 20px;">
        <td border=".5">@php
            $num+=1;
        @endphp
        {{$num}}</td>
        <td border=".5">
            {{$file->actividad}}
        </td>
        <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
            {{$file->cantidad}}
        </td>
    </tr>

@endif
@endforeach
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Deportivo</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
<tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
<td border=".5" width="8%">N°</td>
<td border=".5" width="47%">Descripción</td>
<td border=".5" width="30%">Fecha</td>
<td border=".5" width="15%">No. Créditos</td>
</tr>
@foreach($files as $file)
@if($file->id_type==3)
    <tr style="text-align:center;line-height: 20px;">
        <td border=".5">@php
            $num+=1;
        @endphp
        {{$num}}</td>
        <td border=".5">
            {{$file->actividad}}
        </td>
        <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
            {{$file->cantidad}}
        </td>
    </tr>
    @endif
@endforeach
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Cultural</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
    <td border=".5" width="8%">N°</td>
    <td border=".5" width="47%">Descripción</td>
    <td border=".5" width="30%">Fecha</td>
    <td border=".5" width="15%">No. Créditos</td>
    </tr>
    @foreach($files as $file)
    @if($file->id_type==4)
        <tr style="text-align:center;line-height: 20px;">
            <td border=".5">@php
                $num+=1;
            @endphp
            {{$num}}</td>
            <td border=".5">
                {{$file->actividad}}
            </td>
            <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
                {{$file->cantidad}}
            </td>
        </tr>
        @endif
    @endforeach
    </table>


<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Tutorias</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
    <td border=".5" width="8%">N°</td>
    <td border=".5" width="47%">Descripción</td>
    <td border=".5" width="30%">Fecha</td>
    <td border=".5" width="15%">No. Créditos</td>
    </tr>
    @foreach($files as $file)
    @if($file->id_type==5)
        <tr style="text-align:center;line-height: 20px;">
            <td border=".5">@php
                $num+=1;
            @endphp
            {{$num}}</td>
            <td border=".5">
                {{$file->actividad}}
            </td>
            <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
                {{$file->cantidad}}
            </td>
        </tr>
        @endif
    @endforeach
    </table>

<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>Extension</td>
    </tr>
</table>

<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
    <td border=".5" width="8%" >N°</td>
    <td border=".5" width="47%">Descripción</td>
    <td border=".5" width="30%">Fecha</td>
    <td border=".5" width="15%">No. Créditos</td>
    </tr>
    @foreach($files as $file)
    @if($file->id_type==6)
        <tr style="text-align:center;line-height: 20px;">
            <td border=".5">@php
                $num+=1;
            @endphp
            {{$num}}</td>
            <td border=".5">
                {{$file->actividad}}
            </td>
            <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
                {{$file->cantidad}}
            </td>
        </tr>
        @endif
    @endforeach
    </table>

<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>TITULACION(TESIS/PROYECTO/TRABAJOS)</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
    <td border=".5" width="8%">N°</td>
    <td border=".5" width="47%">Descripción</td>
    <td border=".5" width="30%">Fecha</td>
    <td border=".5" width="15%">No. Créditos</td>
    </tr>
    @foreach($files as $file)
    @if($file->id_type==7)
        <tr style="text-align:center;line-height: 20px;">
            <td border=".5">@php
                $num+=1;
            @endphp
            {{$num}}</td>
            <td border=".5">
                {{$file->actividad}}
            </td>
            <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
                {{$file->cantidad}}
            </td>
        </tr>
        @endif
    @endforeach
    </table>

<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
        <td>TITULACION(DIPLOMADO,MAESTRIA,EXPERIENCIA PROFESIONAL/EGEL)</td>
    </tr>
</table>
<table width="100%" style="text-align:center">
    <tr style="background-color:rgb(185, 14, 14); color:white;text-align:center">
    <td border=".5" width="8%">N°</td>
    <td border=".5" width="47%">Descripción</td>
    <td border=".5" width="30%">Fecha</td>
    <td border=".5" width="15%">No. Créditos</td>
    </tr>
    @foreach($files as $file)
    @if($file->id_type==8)
        <tr style="text-align:center;line-height: 20px;">
            <td border=".5">@php
                $num+=1;
            @endphp
            {{$num}}</td>
            <td border=".5">
                {{$file->actividad}}
            </td>
            <td border=".5">
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
                ?>
                
            {{date("j",strtotime($file->fecha))}} {{$mes1}} {{date("Y",strtotime($file->fecha))}}
            </td>
            <td border=".5">
                {{$file->cantidad}}
            </td>
        </tr>
        @endif
    @endforeach
    </table>
    <table >
        <tr style="text-align:center">
            <td></td>
            <td></td>
            <td border=".5" style="background-color:rgb(185, 14, 14); color:white;text-align:center">Total de créditos</td>
            <td border=".5">
                @foreach($orders as $order)
                    {{$order->total}}
                @endforeach
            </td>
        </tr>
    </table>





