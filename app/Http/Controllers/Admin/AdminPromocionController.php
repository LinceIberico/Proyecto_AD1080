<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Promocion;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class AdminPromocionController extends Controller
{
    public function index(Request $request){ 
        
        // $promociones = Promocion::all();
        
        // return view('admin.promociones',compact('promociones'));
        if ($request->ajax()) {

            $data = DB::select('SELECT id, nomPromo, descuento, descripcion, vigente, created_at, updated_at FROM promocions');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'admin.promocion.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')
                    // <a href="{{route(\'editar-promocion.edit\',$id)}}" class="button" <span class="icon is-small"><i class="fas fa-edit"></i> Editar</span> </a> 
                    // <button class="btn btn-lg" style="background-color:transparent;"><i class="fa fa-pencil"></i> Edit</button>
                    ->rawColumns(['editar'])
                    ->make(true);
                    //->toJson();

        }

        return view('admin/promociones');

    }
    
    public function create(){

        return view('admin/nuevaPromocion');
    }

    public function store(Request $request){

        $promo = new Promocion();

        $promo->nomPromo = $request->nomPromo;
        $promo->descuento = $request->descuento;
        $promo->descripcion = $request->descripcion;
        $promo->vigente = $request->vigente;

        $promo->save();

        return redirect()->route('admin.promocion.create');

    }

    public function edit(Promocion $promo){  

    return view('admin/editarPromo',compact('promo'));

    }

    public function update(Request $request , Promocion $promo){

        $promo->nomPromo = $request->nomPromo;
        $promo->descuento = $request->descuento;
        $promo->descripcion = $request->descripcion;
        $promo->vigente = $request->vigente;

        $promo->update();
        //return dd($promo);
        return redirect()->route('promociones.index');
    }
}
