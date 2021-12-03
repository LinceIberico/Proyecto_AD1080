<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boda extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'idUserFK', 'nomBoda', 'fechaBoda', 'horaBoda', 'nomNovio', 'nomNovia', 
    'dirNovio', 'dirNovia', 'tlfNovio', 'tlfNovia', 'emailNovio', 'emailNovia', 'ceremonia', 'celebracion', 'descripcion'];
    //Relacion uno a muchos hacia presupuesto
    public function presupuestos(){
        return $this->hasMany('App\Models\Presupuesto');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
