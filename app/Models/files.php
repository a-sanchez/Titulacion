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
    
}
