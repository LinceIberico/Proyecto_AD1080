<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Extra;
use App\Models\Promocion;
use App\Models\Boda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackController extends Controller
{
    
    public function mostrarComboFormulario(){

        $idUsuarioBoda = Auth::user()->id;
        $user = DB::table('users')->select('id')->where('id', '=',$idUsuarioBoda)->get();

        
        $idUserFK = DB::table('bodas')->select('idUserFK')->where('idUserFK', '=', $idUsuarioBoda)->get();
        $nomBoda = DB::table('bodas')->select('nomBoda')->where('idUserFK', '=', $idUsuarioBoda)->get();

        //$boda = Boda::all();
        $boda = DB::table('bodas')->select('id','nomBoda','idUserFK')->where('idUserFK','=',$idUsuarioBoda)->orderBy('created_at','DESC')->get();
        $paquetes = Pack::where('vigente','SI')->get();
        $extras = Extra::where('vigente','SI')->get();

        $selected = "";
        if(isset($extra['id']) == 2){
            $selected = 'selected';
            
        }
        $promociones = Promocion::where('vigente','SI')->get();

        return view('crearPresupuesto', compact('paquetes','extras','selected','promociones','boda'));
    }

}
