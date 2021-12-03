<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Boda;
use App\Models\Presupuesto;
use App\Models\Extra;
use App\Models\Pack;
use App\Models\Linea_Presupuesto;
use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade as PDF;

class AdminPresupuestoController extends Controller
{
    public function index(Request $request){ 

        // $presupuesto = Presupuesto::join('linea_presupuesto','linea_presupuesto.idPresupuestoFK','=','presupuestos.id')
        // ->join('bodas','bodas.id','=','presupuestos.idBodaFK')
        // ->join('packs','packs.id','=','presupuestos.idPackFK')
        // ->join('promocions','promocions.id','=','presupuestos.idPromoFK')
        // ->join('extras','extras.id','=','linea_presupuesto.idExtraFK')        
        // ->select('nomPresupuesto','fechaPresupuesto','precioTotal','observaciones','pagado','nomBoda','fechaBoda','nomPack','nomExtra','nomPromo')->where('presupuestos.id',2)->distinct()->get();
        // return $presupuesto;
        if ($request->ajax()) {

            // $data2 = DB::select('SELECT lp.idPresupuestoFK , e.nomExtra FROM presupuestos pre, linea_presupuesto lp, extras e 
            //                     WHERE pre.id = lp.idPresupuestoFK AND lp.idExtraFK = e.id');

            // $data = DB::select('SELECT DISTINCTROW pre.id, pre.nomPresupuesto, pre.fechaPresupuesto, pre.precioTotal, pre.observaciones,pre.pagado, b.nomBoda, b.fechaBoda,p.nomPack, pro.nomPromo, pre.updated_at 
            //                     FROM presupuestos pre 
            //                     INNER JOIN bodas b ON b.id = pre.idBodaFK 
            //                     INNER JOIN packs p ON p.id = pre.idPackFK 
            //                     INNER JOIN promocions pro ON pro.id = pre.idPromoFK');
                                // INNER JOIN linea_presupuesto lp ON lp.idPresupuestoFK = pre.id 
                                // INNER JOIN extras e ON e.id = lp.idExtraFK');
                                $data = DB::select('SELECT DISTINCTROW pre.id, pre.nomPresupuesto, pre.fechaPresupuesto, pre.precioTotal, pre.observaciones,pre.pagado, b.nomBoda, b.fechaBoda,p.nomPack, pro.nomPromo, pre.updated_at 
                                FROM presupuestos pre 
                                INNER JOIN bodas b ON b.id = pre.idBodaFK 
                                INNER JOIN packs p ON p.id = pre.idPackFK 
                                INNER JOIN promocions pro ON pro.id = pre.idPromoFK
                                ORDER BY pre.id DESC');

            // $data = DB::select('SELECT DISTINCTROW pre.id, pre.nomPresupuesto, pre.fechaPresupuesto, pre.precioTotal, pre.observaciones,pre.pagado, b.nomBoda, b.fechaBoda,p.nomPack,pro.nomPromo, pre.updated_at
            //                     FROM presupuestos pre
            //                     INNER JOIN bodas b ON b.id = pre.idBodaFK
            //                     INNER JOIN packs p ON p.id = pre.idPackFK
            //                     INNER JOIN promocions pro ON pro.id = pre.idPromoFK');
            
            // $extras = DB::select("SELECT lp.idPresupuestoFK , e.nomExtra FROM presupuestos pre, linea_presupuesto lp, extras e 
            //                     WHERE pre.id = lp.idPresupuestoFK AND lp.idExtraFK = e.id AND lp.idPresupuestoFK = '".$data['id']."'");

            

            //$data = DB::select('SELECT pre.id, pre.nomPresupuesto, pre.fechaPresupuesto, pre.precioTotal, pre.observaciones, pre.pagado, b.nomBoda, b.fechaBoda, p.nomPack, e.nomExtra, pre.nomPromo, pre.updated_at FROM presupuestos pre INNER JOIN bodas b ON pre.idBodaFK = b.id INNER JOIN packs p ON pre.idPackFK = p.id INNER JOIN linea_presupuesto lp ON pre.id = lp.idPresupuestoFK INNER JOIN extras e ON e.id = lp.idExtraFK');
            return Datatables::of($data)                    

                    ->addIndexColumn()
                    ->addColumn('mostrar', '<div class="d-flex flex-wrap"><a href="{{route(\'presupuestos.show\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-eye"></i> Mostrar</a></div>')
                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'presupuestos.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')                    
                    ->rawColumns(['mostrar','editar'])
                    ->make(true);
                    //->toJson();     
                    
                   
        }
         return view('admin/presupuestos');
    }
    

    public function show(Presupuesto $presupuesto){

        $idPresupuesto = $presupuesto->id;

        $boda = Boda::find($presupuesto->idBodaFK);
        $pack = Pack::find($presupuesto->idPackFK);
        $extras = DB::select("SELECT e.nomExtra, e.precioExtra, e.descripcion FROM presupuestos pre, linea_presupuesto lp, extras e 
                              WHERE pre.id = lp.idPresupuestoFK AND lp.idExtraFK = e.id AND lp.idPresupuestoFK = '".$idPresupuesto."'");
        
        $promo = Promocion::find($presupuesto->idPromoFK);

        //return dd($presupuesto,$boda,$pack,$extras,$promo);
        return view('admin.mostrarPresupuesto', compact('presupuesto','boda','pack','extras','promo'));
    }

    public function create(){

        //$bodas = Boda::orderBy('id', 'DESC')->get();
        $bodas = DB::select('SELECT b.id, b.nomBoda, b.fechaBoda FROM bodas b LEFT JOIN presupuestos p ON p.idBodaFK = b.id WHERE p.idBodaFK is null');
        $packs = Pack::where('vigente','SI')->get();
        $extras = Extra::where('vigente','SI')->get();
        $promociones = Promocion::where('vigente','SI')->get();

        //return $bodas;
        return view('admin/nuevoPresupuesto', compact('bodas','packs','extras','promociones'));
    }

    public function edit(Presupuesto $presupuesto){

        $idPresupuesto = $presupuesto->id;

        $boda = Boda::find($presupuesto->id);
        $packs = Pack::where('vigente','SI')->get();
        $selectedPack = $presupuesto->idPackFK;

        $promociones = Promocion::where('vigente','SI')->get();
        $selectedPromo = $presupuesto->idPromoFK;
 
        $extras = Extra::where('vigente','SI')->get();
        $selectedExtras = Extra::join('linea_presupuesto','linea_presupuesto.idExtraFK','=','extras.id')        
         ->join('presupuestos','presupuestos.id','=','linea_presupuesto.idPresupuestoFK')        
         ->select('extras.id','extras.nomExtra','extras.precioExtra','extras.descripcion')->where('presupuestos.id',$idPresupuesto)->distinct()->get();
       
        return view('admin.editarPresupuesto',compact('presupuesto','boda','packs','selectedPack','extras','selectedExtras','promociones','selectedPromo'));
    }
    
    public function store(Request $request, Presupuesto $presupuesto, Linea_Presupuesto $linea_Presupuesto){

        $presupuesto->nomPresupuesto = $request->nomPresupuesto;
        $presupuesto->fechaPresupuesto = $request->fechaPresupuesto;
        $presupuesto->pagado = $request->pagado;
        $presupuesto->observaciones = $request->observaciones;
        $presupuesto->precioTotal = $request->precioTotal;
        $presupuesto->idBodaFK = $request->comboBodaPresupuesto;
        $presupuesto->idPackFK = $request->comboPackPresupuesto;
        $presupuesto->idPromoFK = $request->comboPromocionPresupuesto;

        $presupuesto->save();

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


        return redirect()->route('presupuestos.index');

    }

    public function update(Request $request, Presupuesto $presupuesto, Extra $extra, Linea_Presupuesto $linea_Presupuesto){
        
        $presupuesto->nomPresupuesto = $request->nomPresupuesto;
        $presupuesto->pagado = $request->pagado;
        $presupuesto->observaciones = $request->observaciones;
        $presupuesto->precioTotal = $request->precioTotal;
        $presupuesto->idPackFK = $request->comboPackPresupuesto;
        $presupuesto->idPromoFK = $request->comboPromocionPresupuesto;

        $presupuesto->update();

        $arrayDeExtras = $request->comboExtraPresupuesto;
        //$linea_Presupuesto->fill($request->all());

        $arrayExtras = array();
        foreach($arrayDeExtras as $extra => $key){
            $array = array(
                'idPresupuestoFK'=>$presupuesto->id,
                'idExtraFK'=> $key
            );
            array_push($arrayExtras,$array);
        }


         $linea_Presupuesto = Linea_Presupuesto::where('idPresupuestoFK',$presupuesto->id)->get()->toArray();
        
        if($linea_Presupuesto != null)
        {
            foreach($linea_Presupuesto as $indice => $atributos){
            
                   $eliminarLinea_Presupuesto = DB::delete('DELETE FROM linea_presupuesto WHERE idPresupuestoFK  = '.$atributos['idPresupuestoFK'].' AND idExtraFK = '.$atributos['idExtraFK'].'');
                    
            }
            foreach($arrayExtras as $indice => $valor){

                $actualizarLinea_Presupuesto = new Linea_Presupuesto;
                $actualizarLinea_Presupuesto->idPresupuestoFK = $valor['idPresupuestoFK'];
                $actualizarLinea_Presupuesto->idExtraFK = $valor['idExtraFK'];
                $actualizarLinea_Presupuesto->save();
            }

        }else{

            foreach($arrayExtras as $indice => $valor){

                $actualizarLinea_Presupuesto = new Linea_Presupuesto;
                $actualizarLinea_Presupuesto->idPresupuestoFK = $valor['idPresupuestoFK'];
                $actualizarLinea_Presupuesto->idExtraFK = $valor['idExtraFK'];
                $actualizarLinea_Presupuesto->save();
            }
        }
        
        //return dd($presupuesto,$arrayExtras[0],$linea_Presupuesto);
        return redirect()->route('presupuestos.index');

    }

    public function obtenerPDF(Presupuesto $presupuesto){
        $idPresupuesto = $presupuesto->id;

        $boda = Boda::find($presupuesto->idBodaFK);
        $pack = Pack::find($presupuesto->idPackFK);
        $extras = DB::select("SELECT e.nomExtra, e.precioExtra, e.descripcion FROM presupuestos pre, linea_presupuesto lp, extras e 
                              WHERE pre.id = lp.idPresupuestoFK AND lp.idExtraFK = e.id AND lp.idPresupuestoFK = '".$idPresupuesto."'");
        $promo = Promocion::find($presupuesto->idPromoFK);
        //return dd($boda);
        $pdf = PDF::loadView('admin.pdfPresupuesto',compact('presupuesto','boda','pack','extras','promo'));
        return $pdf->setPaper('a4')->download($presupuesto->nomPresupuesto.'.pdf');

    }

}
