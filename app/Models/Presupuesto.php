<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $fillable = ['nomPresupuesto','fechaPresupuesto','precioTotal','observaciones','idBodaFK','idPackFK','idPromoFK'];

    //Relacion uno a muchos (inversa) hacia boda
    public function boda(){
        return $this->belongsTo('App\Models\Boda');
    }

    //Relacion uno a muchos (inversa) hacia pack
    public function pack(){
        return $this->belongsTo('App\Models\Pack');
    }

    public function linea_presupuesto(){
        return $this->belongsToMany(Presupuesto::class, 'Linea_Presupuesto', 'idPresupuestoFK','idExtraFK');
    }
    //Relacion uno a muchos (inversa) hacia promocion
    public function promocion(){
        return $this->belongsTo('App\Models\Promocion');
    }

    //Relacion muchos a muchos hacia Extra
    public function extras(){
        return $this->hasMany('App\Models\Extra', 'id');
    }
}
