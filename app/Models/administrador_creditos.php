<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador_creditos extends Model
{
    use HasFactory;
    protected $table='administrador_creditos';
    public $timestamps=true;
    protected $guarded=[];
}
