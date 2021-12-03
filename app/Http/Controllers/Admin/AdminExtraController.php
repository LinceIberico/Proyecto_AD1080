<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extra;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class AdminExtraController extends Controller
{
    public function index(Request $request){ 
        
        if ($request->ajax()) {

            $data = DB::select('SELECT id, nomExtra, precioExtra, descripcion, vigente, created_at, updated_at FROM extras');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'extras.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')                    
                    ->rawColumns(['editar'])
                    ->make(true);
                    //->toJson();

        }

        return view('admin.extras');

    } 
    
    public function create(){
        
        return view('admin/nuevoExtra');
    }

    public function store(Request $request){

        Extra::create($request->all());

        return redirect()->route('extras.create');
    }

    public function edit(Extra $extra){

        return view('admin/editarExtra', compact('extra'));
    }

    public function update(Request $request, Extra $extra){

        $extra->nomExtra = $request->nomExtra;
        $extra->precioExtra = $request->precioExtra;
        $extra->descripcion = $request->descripcion;
        $extra->vigente = $request->vigente;

        $extra->update();
        //return dd($extra);
        return redirect()->route('extras.index');
    }
}
