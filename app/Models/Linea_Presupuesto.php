<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Linea_Presupuesto extends Pivot
{
    use HasFactory;
    protected $table = 'linea_presupuesto';

    protected $fillable = ['id','idPresupuestoFK','idExtraFK','created_at','updated_at'];


    public function presupuesto(){
        return $this->belongsToMany('App\Models\Presupuesto');
    }

    public function extra(){
        return $this->belongsToMany('App\Models\Extra');
    }
}
