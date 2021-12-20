<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PDF;

class karnetPDF extends Model
{
    use HasFactory;

   public static function create($id){

    $student = acceso::where('id',$id)->first();
    $administrador=DB::table('administrador_creditos')
                    ->select('administrador')
                    ->where('id',1)->get();
    $files=DB::table('files')
    ->select('actividad','file','files.id_type','types.tipo','students.carrera','students.matricula','students.nombre_completo as nombre','students.email','types.cantidad','files.id_student','files.id','files.created_at as fecha')
    ->join('types', 'types.id', '=', 'files.id_type')
    ->join('students','students.id','=','files.id_student')
    ->where('files.id_student',$id)->get();

    $orders = DB::table('files')
                ->select('id_student', DB::raw('SUM(cantidad) as total'))
                ->join('types', 'types.id', '=', 'files.id_type')
                ->where ('files.id_student','=',$id)
                ->groupBy('id_student')
                ->get();

    PDF::setHeaderCallback(function($pdf){
        $pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'F', array(), array( 247, 247, 247));
        // Set font
        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->SetMargins(0,30, 0); 
        // Title
        $pdf->Image(\URL::asset("images/uadec.jpg"),0, 0, 60, 30, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->Image(\URL::asset("images/sistemas.jpg"),155, 3, 50, 20, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->SetY(10);
        $pdf->Cell(0, 0, 'KARNET DE CRÉDITOS', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    });
    PDF::AddPage('P', 'Letter');
    $view = \View::make("alumno.alumno_pdf",compact("files","orders","student"));
    $html = $view->render();
    PDF::SetFont('helvetica', '',12);
    PDF::setY(28);
    PDF::writeHTML($html,true,0,false,false,"");
        $html = <<<EOD
      <table cellpadding="3">
          <tr >
              <td height = "50px" width="25%"></td>
              <td   width="50%" height = "50px"></td> 
              <td height = "50px"></td> 
            
          </tr>
          <tr style = "text-align: center;">
              <td></td>
              <td style="border-top: 1px solid #000;"><b>Administrativo del área de créditos extracurriculares</b><br>{$administrador[0]->administrador}</td> 
              <td></td>
          </tr>
      </table>
EOD;
   
    //OBTIENE INSERTA EL HTML EN EL PDF
    PDF::SetAutoPageBreak(false); 
    PDF::writeHTMLCell('0','0','10','250',$html);
    PDF::Output();

}
}

