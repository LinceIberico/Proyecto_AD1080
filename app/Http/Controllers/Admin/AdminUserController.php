<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(){ 
        
        $categorias = Categoria::all();
        
        return view('admin.nuevoUsuario',compact('categorias'));
    }

    public function store(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->idCategoriaFK = $request->comboPackCategoria;

        $user->save();

        return redirect()->route('admin.nuevoUsuario');

    }
}
