<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nomExtra', 'precioExtra', 'descripcion', 'vigente'];

    //Relacion muchos a muchos hacia presupuestos
    public function presupuestos(){
        return $this->belongsToMany('App\Models\Presupuesto');
    }

    
    public function linea_presupuesto(){
        return $this->belongsToMany('App\Models\Linea_Presupuesto');
    }
}
