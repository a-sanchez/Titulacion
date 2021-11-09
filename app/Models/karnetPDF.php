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
    $files=DB::table('files')
    ->select('actividad','file','files.id_type','types.tipo','types.cantidad','files.id_student','files.id','files.created_at as fecha')
    ->join('types', 'types.id', '=', 'files.id_type')
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
        $pdf->SetY(10);
        $pdf->Cell(0, 0, 'KARNET DE CREDITOS', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    });
    PDF::setFooterCallback(function($pdf){
        $html = <<<EOD
      <table border=".5" cellpadding="2">
          <tr >
              <td height = "50px"></td>
              <td height = "50px"></td> 
          </tr>
          <tr style = "text-align: center;">
              <td><b>Director de la Facultad de Sistemas</b><br>Ing. Jesús Rabindranath Galván Gil </td>
              <td><b>Administrativo del área de créditos extracurriculares</b><br>Lic.Fabiola Catalina Ramírez Valadez</td> 
          </tr>
      </table>
EOD;
        $pdf->writeHTMLCell('0','0','10','250',$html);
    });
    PDF::AddPage('P', 'Letter');
    $view = \View::make("alumno.alumno_pdf",compact("files","orders"));
    $html = $view->render();
    PDF::SetFont('helvetica', '',12);
    //OBTIENE INSERTA EL HTML EN EL PDF
    PDF::writeHTMLCell('0','0','10','30',$html);
    PDF::Output();

}
}

