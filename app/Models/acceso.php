<?php

namespace App\Models;

use App\Models\files;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class acceso extends Model
{
    use HasFactory;
    protected $table='students';
    public $timestamps=true;
    protected $guarded=[];
    protected $appends=["creditos"];

    public function getCreditos(){
       $files = files::where("id_student",$this->attributes["id"])->get();
       $total = 0;
       foreach ($files as $file) {
           $total += $file->type->cantidad;
       }
       return $total;
    }
}
