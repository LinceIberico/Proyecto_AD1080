<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminPackController extends Controller
{
    public function index(Request $request){ 
        
        if ($request->ajax()) {

            $data = DB::select('SELECT id, nomPack, precioPack, descripcion, vigente, created_at, updated_at FROM packs');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'packs.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')
                    // <a href="{{route(\'editar-promocion.edit\',$id)}}" class="button" <span class="icon is-small"><i class="fas fa-edit"></i> Editar</span> </a> 
                    // <button class="btn btn-lg" style="background-color:transparent;"><i class="fa fa-pencil"></i> Edit</button>
                    ->rawColumns(['editar'])
                    ->make(true);
                    //->toJson();

        }
        return view('admin/packs');
    }

    public function create(){

        return view('admin/nuevoPack');
    }
    

    public function store(Request $request){

        $pack = new Pack();

        $pack->nomPack = $request->nomPack;
        $pack->precioPack = $request->precioPack;
        $pack->descripcion = $request->descripcion;
        $pack->vigente = $request->vigente;

        $pack->save();        

        return redirect()->route('packs.create');

    }

    public function edit(Pack $pack){  

        return view('admin/editarPack',compact('pack'));
    
    }

    public function update(Request $request, Pack $pack){

        $pack->nomPack = $request->nomPack;
        $pack->precioPack = $request->precioPack;
        $pack->descripcion = $request->descripcion;
        $pack->vigente = $request->vigente;

        $pack->update();

        return redirect()->route('packs.index');
    }
}
