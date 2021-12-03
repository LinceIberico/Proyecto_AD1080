<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Categoria;

class AdminUsuarioController extends Controller
{
    public function index(Request $request){ //Aqui vamos a retornar a la vista del admin

        if ($request->ajax()) {

            $data = DB::select('SELECT u.id, u.name, u.email, c.categoria ,u.created_at, u.updated_at FROM users u, categorias c WHERE c.id = u.idCategoriaFK');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('editar', '<div class="d-flex flex-wrap"><a href="{{route(\'admin.usuario.edit\',$id)}}" class="btn btn-info mx-auto" ><i class="fas fa-edit"></i> Editar</a></div>')
                    
                    ->rawColumns(['editar'])
                    ->make(true);
                    //->toJson();

        }

        return view('admin/usuarios');       
    }
    
    public function edit(User $user){

        $categorias = Categoria::all();

        $selected = $user->idCategoriaFK;

        return view('admin.editarUsuario', compact('user','categorias','selected'));
    }

    public function update(Request $request , User $user){

        $user->name = $request->name;
        $user->email = $request->email;
        $user->idCategoriaFK = $request->comboCategoria;

        $user->update();
        //return dd($user);
        return redirect()->route('usuarios');
    }
}
