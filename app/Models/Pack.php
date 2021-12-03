<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nomPack', 'precioPack', 'descripcion', 'vigente'];

    //Relacion uno a muchos hacia presupuesto
    public function presupuestos(){
        return $this->hasMany('App\Models\Presupuestos');
    }

}
