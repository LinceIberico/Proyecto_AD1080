<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Boda;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
//use PDF;


class AdminBodaController extends Controller
{
    public function index(Request $request){ //Aqui vamos a retornar a la vista del admin

        if ($request->ajax()) {

            $data = DB::select('SELECT b.id, u.name, b.nomBoda, b.fechaBoda, b.horaBoda, b.nomNovio, b.nomNovia, b.dirNovio, b.dirNovia, b.tlfNovio, b.tlfNovia, b.emailNovio, b.emailNovia, b.ceremonia, b.celebracion, b.descripcion, b.created_at, b.updated_at  FROM bodas b, users u WHERE u.id = b.idUserFK');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'bodas.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')
                    ->addColumn('mostrar', '<div class="d-flex flex-wrap"><a href="{{route(\'bodas.show\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-eye"></i> Mostrar</a></div>')                    
                    ->rawColumns(['editar','mostrar'])
                    ->make(true);
                    //->toJson();

        }        

        return view('admin.bodas');        
    }
    public function show(Boda $boda){

        return view('admin.mostrarBoda', compact('boda'));
    }

    public function create(){
        $users = Auth::user()->id;
        
        return view('admin/nuevaBoda',compact('users'));
    }

    public function store(Request $request){

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
        $boda->descripcion = $request->descripcion;

        $boda->save();

        //return dd($request->all());

        //Boda::create($request->all());

        return redirect()->route('bodas.index');
    }

    public function edit(Boda $boda){

        return view('admin/editarBoda', compact('boda'));
    }

    public function update(Request $request, Boda $boda){

        $boda->update($request->all());

        $boda->update();

        return redirect()->route('bodas.show',$boda);
    }

    public function obtenerPDF(Boda $boda){

        $pdf = PDF::loadView('admin.pdfBoda',compact('boda'));
        return $pdf->download($boda->nomBoda.' '.$boda->fechaBoda.'.pdf');

    }
}
