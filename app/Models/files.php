<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\type;

class files extends Model
{
    use HasFactory;
    protected $table='files';
    protected $guarded=[];
    public function type(){
        return $this->belongsTo(type::class,"id_type");
    }
    public function setFile($file)
    {
        $filename =$file->hashName();
        $file->store($this->getRuta());
        $this->attributes["file"] = $filename;
        $this->save();
    }
    public function getRuta()
    {
        $ruta ="public/docs/alumnos/".$this->attributes["id_student"];
        return $ruta;
    }
    
}
