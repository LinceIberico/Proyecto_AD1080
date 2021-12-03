<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boda;
use App\Models\Presupuesto;
use App\Models\Pack;
use App\Models\Extra;
use App\Models\Promocion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class BodaController extends Controller
{
   public function show(){
    $bodas = Boda::all();
    //$bodas = Boda::distinct()->select('*')->where('users.id','=','bodas.idUserFK');
    $idUsuarioBoda = Auth::user()->id;
        $user = DB::table('users')->select('id')->where('id', '=',$idUsuarioBoda)->get();
    //$bodas = Boda::where('idUserFK', '=',$idUsuarioBoda)->get();

    $bodas = DB::table('bodas')->select('*')->where('idUserFK', '=', $idUsuarioBoda)->take(1)->get();
      //$bodaABuscar = DB::table('bodas')->where('idUserFK', '=', '$idUsuarioBoda')->get();
      //$bodas = Boda::find($bodaABuscar);

        //return $boda;
        return view('miBoda', compact('bodas'));
   }

   public function edit($id){

    $bodas = Boda::where('id',$id)->get();
    //  return dd($bodas);
    return view('editarBoda', compact('bodas'));
   }

   public function update(Request $request, Boda $boda){
    
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
    //$boda->update($request->all());

    $boda->update();
    //return $boda;
    return redirect()->route('bodas.show',$boda);
   }

   public function obtenerPDF(Boda $boda){

        $idBoda = $boda->id;        

        $presupuesto = Presupuesto::where('idBodaFK',$idBoda)->get();

        if(sizeof($presupuesto) == 0){          

          $pdf = PDF::loadView('admin.pdfBoda',compact('boda'));
          return $pdf->setPaper('a4')->download($boda['nomBoda'].'.pdf');

        }else{
          foreach($presupuesto as $valor => $key){
            $promo = Promocion::find($key['idPromoFK']);
            $pack = Pack::find($key['idPackFK']);
            $extras = DB::select("SELECT e.nomExtra, e.precioExtra, e.descripcion FROM presupuestos pre, linea_presupuesto lp, extras e 
                                  WHERE pre.id = lp.idPresupuestoFK AND lp.idExtraFK = e.id AND lp.idPresupuestoFK = '".$key['id']."'");
   
        }
        // return [$presupuesto];
      $pdf = PDF::loadView('admin.pdfPresupuestoCliente',compact('presupuesto','boda','pack','extras','promo'));
      return $pdf->setPaper('a4')->download($key['nomPresupuesto'].'.pdf');
        }

      

}

}
