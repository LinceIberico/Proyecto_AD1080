<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    //Relacion uno a muchos hacia presupuesto
    public function presupuestos(){
        return $this->hasMany('App\Models\Presupuestos');
    }
}
