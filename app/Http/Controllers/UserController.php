<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boda;
use App\Models\Presupuesto;
use App\Models\Linea_Presupuesto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function index(){ //Aqui vamos a retornar a la vista de usuario 
        $users = Auth::user()->id;

        return view('crearBoda', compact('users'));
    }

    public function crearPresupuesto(){ //Aqui vamos a retornar a la vista de usuario 
        $idUser = Auth::user()->id;
        $boda = Boda::where('idUserFK','=',$idUser);

        //return $boda;
        return view('crearPresupuesto',compact('boda'));
    }

    public function miBoda(){ //Aqui vamos a retornar a la vista de usuario 
        return view('miBoda');
    }
    public function nuevaBoda(Request $request){
        $boda = new Boda();

        $boda->idUserFK = $request->idUsuarioFK;
        $boda->nomBoda = $request->nomBoda;
        $boda->fechaBoda = $request->fechaBoda;
        $boda->horaBoda = $request->horaBoda;
        $boda->nomNovio = $request->nomNovio;
        $boda->nomNovia = $request->nomNovia;
        $boda->dirNovio = $request->dirNovio;
        $boda->dirNovia = $request->dirNovia;
        $boda->tlfNovio = $request->tlfNovio;
        $boda->tlfNovia = $request->tlfNovia;
        $boda->emailNovio = $request->emailNovio;
        $boda->emailNovia = $request->emailNovia;
        $boda->ceremonia = $request->ceremonia;
        $boda->celebracion = $request->celebracion;

        $boda->save();
        
        return redirect()->route('crearPresupuesto');
        
    }

    public function nuevoPresupuesto(Request $request, Presupuesto $presupuesto, Linea_Presupuesto $linea_Presupuesto){
        //$presupuesto = Presupuesto::create($request->all());
        $presupuesto = new Presupuesto;
        
        $presupuesto->nomPresupuesto = $request->nomPresupuesto;
        $presupuesto->fechaPresupuesto = $request->fechaPresupuesto;
        $presupuesto->precioTotal = $request->precioTotal;
        $presupuesto->pagado = "NO";
        $presupuesto->observaciones = $request->observaciones;
        $presupuesto->idBodaFK = $request->idBodaPresupuesto;
        $presupuesto->idPackFK = $request->comboPackPresupuesto;
        $presupuesto->idPromoFK = $request->comboPromocionPresupuesto;

        // return $request->nomPresupuesto;
        $presupuesto->save();

        $idUltimoPresupuesto = $presupuesto->id;

        //Para añadir en linea_presupuesto los extras del presupuesto
        $arrayDeExtras = $request->comboExtraPresupuesto;
        $arrayExtras = array();
        foreach($arrayDeExtras as $extra => $key){
            $array = array(
                'idPresupuestoFK'=>$presupuesto->id,
                'idExtraFK'=> $key
            );
            array_push($arrayExtras,$array);
        }
        foreach($arrayExtras as $indice => $valor){

            $actualizarLinea_Presupuesto = new Linea_Presupuesto;
            $actualizarLinea_Presupuesto->idPresupuestoFK = $valor['idPresupuestoFK'];
            $actualizarLinea_Presupuesto->idExtraFK = $valor['idExtraFK'];
            $actualizarLinea_Presupuesto->save();
        }

        $boda = Boda::orderBy('id','DESC')->take(1)->get();

        return redirect()->route('miBoda', compact('boda'));
        
    }

    public function editarBoda(Boda $boda){
        
        $this->boda = $boda;

        //return $boda;
        // return view('miBoda', compact('bodas'));

    }

}
